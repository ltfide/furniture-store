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
        <CartBox :totalCart="user.cart" />
      </div>
    </nav>
  </header>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../store";
import { useRouter } from "vue-router";
import CartBox from "../core/CartBox.vue";

const router = useRouter();
const user = computed(() => store.state.user.data);

store.dispatch("getUser");

function logout(ev) {
  ev.preventDefault();
  store.dispatch("logout").then(() => {
    router.go();
  });
}
</script>
