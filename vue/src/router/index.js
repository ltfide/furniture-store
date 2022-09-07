import { createRouter, createWebHistory } from "vue-router";
import DefaultLayout from "../components/DefaultLayout.vue";
import Product from "../views/Product.vue";
import Blog from "../views/BlogView.vue";
import UserSettings from "../views/UserSettings.vue";
import Cart from "../views/Cart.vue";
import Coba from "../views/Coba.vue";
import review from "../views/review.vue";
import view from "../views/view.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "../store";

function lazyLoad(view) {
    return () => import(`../views/${view}.vue`);
}

const routes = [
    {
        path: "/",
        component: DefaultLayout,
        meta: { requiresAuth: true },
        children: [
            {
                path: "/",
                name: "Home",
                component: lazyLoad("Home"),
            },
            {
                path: "/user/settings",
                name: "UserSettings",
                component: UserSettings,
            },
            { path: "/product/:slug", name: "ProductView", component: Product },
            { path: "/blog/:slug", name: "BlogView", component: Blog },
            { path: "/review", name: "review", component: review },
            { path: "/view", name: "view", component: view },
        ],
    },
    {
        path: "/cart",
        name: "Cart",
        component: Cart,
        meta: { requiresAuth: true },
    },
    {
        path: "/auth",
        redirect: "/login",
        name: "Auth",
        meta: { isGuest: true },
        component: AuthLayout,
        children: [
            {
                path: "/login",
                name: "Login",
                meta: { isGuest: true },
                component: Login,
            },
            {
                path: "/register",
                name: "Register",
                component: Register,
            },
        ],
    },
    {
        path: "/coba",
        name: "Coba",
        component: Coba,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0, behavior: "smooth" };
    },
});

router.beforeEach((to, from, next) => {
    if (store.state.user.token && to.meta.isGuest) {
        next({ name: "Home" });
    } else {
        next();
    }
});

export default router;
