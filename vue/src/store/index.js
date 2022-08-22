import axios from "axios";
import { createStore } from "vuex";
import axiosClient from "../axios";

// create a new store instance
const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
        products: {
            loading: false,
            data: {},
        },
        currentProduct: {
            loading: false,
            data: {},
        },
        totalCart: 0,
        cart: {
            loading: false,
            data: {},
        },
        blogs: {
            loading: false,
            data: {},
        },
        currentBlogs: {
            loading: false,
            data: {},
        },
        notification: {
            show: false,
            type: "success",
            message: "",
        },
    },
    actions: {
        increment({ commit }) {
            return commit("setincrement");
        },
        register({ commit }, user) {
            return axiosClient.post("/register", user).then(({ data }) => {
                commit("setUser", data.user);
                commit("setToken", data.token);
            });
        },
        login({ commit }, user) {
            return axiosClient.post("/login", user).then(({ data }) => {
                commit("setUser", data.user);
                commit("setToken", data.token);
                return data;
            });
        },
        logout({ commit }) {
            return axiosClient.post("/logout").then((res) => {
                commit("setLogout");
                return res;
            });
        },
        getUser({ commit }) {
            return axiosClient.get("/user").then(({ data }) => {
                commit("setUser", data);
            });
        },
        getProductData({ commit }, { url = null } = {}) {
            commit("productLoading", true);
            url = url || "/products";
            return axiosClient.get(url).then((res) => {
                commit("productLoading", false);
                commit("setProductData", res.data);
                return res;
            });
        },
        getProductByCategory({ commit }, query) {
            commit("productLoading", true);
            return axiosClient
                .get(`/products/?category=${query}`)
                .then((res) => {
                    commit("productLoading", false);
                    commit("setProductData", res.data);
                    return res;
                });
        },
        getProduct({ commit }, slug) {
            commit("currentLoading", true);
            return axiosClient.get(`/products/${slug}`).then((res) => {
                commit("currentLoading", false);
                commit("setCurrentProduct", res.data);
                return res;
            });
        },
        getBlogData({ commit }) {
            commit("blogLoading", true);
            return axiosClient.get("/blogs").then((res) => {
                commit("blogLoading", false);
                commit("setBlogData", res.data);
                return res;
            });
        },
        getProductCart({ commit }) {
            commit("cartLoading", true);
            return axiosClient
                .get("/carts")
                .then((res) => {
                    commit("cartLoading", false);
                    commit("setProductCart", res.data.data);
                    return res;
                })
                .catch((error) => {
                    commit("cartLoading", false);
                    return error;
                });
        },
        getCartNotification({ commit }) {
            return axiosClient.get("/cart-notification").then((res) => {
                commit("setTotalCart", res.data);
                return res;
            });
        },
        addCartProduct({ commit }, id) {
            return axiosClient.post("/add-to-cart", id).then((res) => {
                store.commit("notify", {
                    type: "success",
                    message: res.data.message,
                });
                return res;
            });
        },
        deleteCartProduct({ commit }, id) {
            return axiosClient.post("/delete-cart-item", id).then((res) => {
                store.commit("notify", {
                    type: "success",
                    message: res.data.message,
                });
                return res;
            });
        },
    },
    mutations: {
        setLogout: (state) => {
            state.user.data = null;
            state.user.token = null;
            sessionStorage.removeItem("TOKEN");
        },
        setincrement(state) {
            state.count++;
        },
        setUser: (state, user) => {
            state.user.data = user;
        },
        setToken: (state, token) => {
            state.user.token = token;
            sessionStorage.setItem("TOKEN", token);
        },
        productLoading: (state, data) => {
            state.products.loading = data;
        },
        setProductData: (state, data) => {
            state.products.data = data;
        },
        currentLoading: (state, data) => {
            state.currentProduct.loading = data;
        },
        setCurrentProduct: (state, data) => {
            state.currentProduct.data = data;
        },
        blogLoading: (state, data) => {
            state.blogs.loading = data;
        },
        setBlogData: (state, data) => {
            state.blogs.data = data;
        },
        setTotalCart: (state, data) => {
            state.totalCart = data;
        },
        cartLoading: (state, data) => {
            state.cart.loading = data;
        },
        setProductCart: (state, data) => {
            state.cart.data = data;
        },
        notify: (state, { message, type }) => {
            state.notification.show = true;
            state.notification.type = type;
            state.notification.message = message;
            setTimeout(() => {
                state.notification.show = false;
            }, 3000);
        },
    },
});

export default store;
