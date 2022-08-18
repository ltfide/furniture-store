<template>
  <header>
    <nav class="bg-white border-b border-gray-300">
      <div class="px-4 sm:px-8">
        <nav class="flex justify-between items-center text-sm">
          <div class="">
            <a href="" class="px-2 py-1 bg-green-500 rounded text-white"
              >Get Voucher</a
            >
            <span class="hidden sm:inline ml-4">Get Special discount</span>
          </div>
          <div class="flex">
            <div v-if="user.name" class="py-1 cursor-pointer group">
              <div class="flex gap-2 items-center">
                <h3
                  class="flex justify-center items-center w-7 text-center h-7 text-white font-semibold rounded-full bg-sky-400"
                >
                  {{ user.name.charAt(0) }}
                </h3>
                <p class="text-slate-600 font-semibold">{{ user.name }}</p>
              </div>
              <div
                class="absolute top-0 z-10 mt-9 right-0 rounded shadow bg-white py-4 mr-4 hidden group-hover:block"
              >
                <ul class="flex flex-col">
                  <li class="hover:bg-gray-200 px-4 py-2">Pesanan saya</li>
                  <li class="hover:bg-gray-200 px-4 py-2">Pengaturan akun</li>
                  <li class="hover:bg-gray-200 px-4 py-2">
                    <a href="" @click="logout">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
            <div v-else>
              <ul class="flex border-gray-300">
                <li
                  class="hidden sm:block uppercase border-r-[1px] p-2 border-gray-300"
                >
                  <router-link
                    class="px-3 py-1 bg-green-500 text-white text-sm rounded"
                    to="/login"
                    >Login</router-link
                  >
                </li>
                <li
                  class="hidden sm:block uppercase border-r-[1px] p-2 border-gray-300"
                >
                  <router-link
                    class="px-3 py-1 bg-white border border-green-500 text-green-500 text-sm rounded"
                    to="/register"
                    >Register</router-link
                  >
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </nav>
    <nav class="px-4 sm:px-8 py-4 flex justify-between items-center shadow">
      <div class="w-36" id="logo">
        <router-link to="/">
          <img class="w-full" src="./../../img/logo.png" alt="logo"
        /></router-link>
      </div>
      <div class="hidden sm:block">
        <ul class="flex gap-3">
          <li
            class="text-slate-600 text-base hover:text-slate-700 cursor-pointer"
          >
            Stores
          </li>
          <li
            class="text-slate-600 text-base hover:text-slate-700 cursor-pointer"
          >
            Products
          </li>
          <li
            class="text-slate-600 text-base hover:text-slate-700 cursor-pointer"
          >
            Collection
          </li>
          <li
            class="text-slate-600 text-base hover:text-slate-700 cursor-pointer"
          >
            Blog
          </li>
          <li
            class="text-slate-600 text-base hover:text-slate-700 cursor-pointer"
          >
            Contact us
          </li>
        </ul>
      </div>
      <div class="flex gap-4">
        <img
          class="w-3 sm:w-5"
          src="./../../img/icons/search.svg"
          alt="search"
        />
        <img class="w-3 sm:w-5" src="./../../img/icons/love-2.svg" alt="love" />
        <div class="relative cursor-pointer group" @mouseenter="getCartData">
          <img
            class="w-5 p-1 sm:w-7 hover:bg-gray-200 rounded-md"
            src="./../../img/icons/cart.svg"
            alt="cart"
          />
          <div
            class="absolute -top-2 -right-3 bg-red-500 text-white text-sm border-2 border-white w-6 h-6 text-center rounded-full"
          >
            {{ user.cart || 0 }}
          </div>
          <div
            v-if="cartLoading"
            class="hidden group-hover:block absolute bg-white -right-2 py-2 rounded shadow w-60"
          >
            <div class="flex mt-2 gap-4 px-2">
              <div class="w-7 h-7 rounded bg-gray-100"></div>
              <div class="w-44 h-7 rounded bg-gray-100"></div>
            </div>
            <div class="flex mt-2 gap-4 pt-2 border-t border-gray-100 px-2">
              <div class="w-7 h-7 rounded bg-gray-100"></div>
              <div class="w-44 h-7 rounded bg-gray-100"></div>
            </div>
            <div class="flex mt-2 gap-4 pt-2 border-t border-gray-100 px-2">
              <div class="w-7 h-7 rounded bg-gray-100"></div>
              <div class="w-44 h-7 rounded bg-gray-100"></div>
            </div>
          </div>
          <div
            v-else-if="carts.length"
            class="hidden group-hover:block absolute bg-white -right-2 py-2 rounded shadow w-60"
          >
            <div v-for="cart in carts" :key="cart.id">
              <router-link
                to="/cart"
                class="flex gap-4 items-center px-2 py-1 border-gray-300 hover:bg-gray-100"
              >
                <img
                  class="max-h-10 rounded"
                  src="https://images.unsplash.com/photo-1592078615290-033ee584e267?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80"
                  alt="img"
                />
                <div class="text-slate-600 text-sm">
                  <h3>{{ cart.title }}</h3>
                  <h5 class="text-green-500">Rp{{ cart.price }}</h5>
                </div>
              </router-link>
            </div>
          </div>
          <div
            v-else
            class="hidden group-hover:block absolute bg-white -right-2 py-2 rounded shadow w-60"
          >
            <h3 class="text-center text-slate-700 mx-auto">Cart empty</h3>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../store";
import { useRouter } from "vue-router";

const carts = computed(() => store.state.cart.data);
const cartLoading = computed(() => store.state.cart.loading);
const router = useRouter();
const user = computed(() => store.state.user.data);

store.dispatch("getUser");

function logout(ev) {
  ev.preventDefault();
  store.dispatch("logout").then(() => {
    router.go();
  });
}

function getCartData() {
  console.log("OK");
  store.dispatch("getProductCart");
}
</script>
