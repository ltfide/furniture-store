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
        blogs: {
            loading: false,
            data: {},
        },
        currentBlogs: {
            loading: false,
            data: {},
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
        getProductData({ commit }) {
            commit("productLoading", true);
            return axiosClient.get("/products").then((res) => {
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
    },
});

export default store;
