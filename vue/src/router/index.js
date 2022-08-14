import { createRouter, createWebHistory } from "vue-router";
import DefaultLayout from "../components/DefaultLayout.vue";
import Home from "../views/Home.vue";
import Product from "../views/Product.vue";
import review from "../views/review.vue";
import view from "../views/view.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "../store";

const routes = [
    {
        path: "/",
        component: DefaultLayout,
        meta: { requiresAuth: true },
        children: [
            { path: "/", name: "Home", component: Home },
            { path: "/:slug", name: "ProductView", component: Product },
            { path: "/review", name: "review", component: review },
            { path: "/view", name: "view", component: view },
        ],
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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (store.state.user.token && to.meta.isGuest) {
        next({ name: "Home" });
    } else {
        next();
    }
});

export default router;
