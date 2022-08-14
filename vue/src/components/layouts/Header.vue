<template>
  <header>
    <nav class="bg-white border-b border-gray-300">
      <div class="container px-4 sm:px-8">
        <nav class="flex justify-between items-center text-sm">
          <div class="">
            <a href="" class="px-2 py-1 bg-green-500 rounded text-white"
              >Get Voucher</a
            >
            <span class="hidden sm:inline ml-4">Get Special discount</span>
          </div>
          <div class="">
            <ul class="flex border-gray-300">
              <li
                class="border-x-[1px] flex gap-2 items-center p-2 border-gray-300"
              >
                <img class="w-5" src="./../../img/icons/en.svg" alt="en" />
                <span>En</span>
              </li>
              <li
                class="border-r-[1px] flex gap-2 items-center p-2 border-gray-300"
              >
                <img class="w-5" src="./../../img/icons/id.svg" alt="id" />
                <span>Id</span>
              </li>
              <li
                class="hidden sm:block uppercase border-r-[1px] p-2 border-gray-300"
              >
                <h3
                  v-if="user.name"
                  class="flex justify-center items-center w-7 text-center h-7 text-white font-semibold rounded-full bg-sky-400"
                >
                  {{ user.name.charAt(0) }}
                </h3>
                <router-link v-else to="/login"
                  >Register or Sign In</router-link
                >
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </nav>
    <nav
      class="container px-4 sm:px-8 py-4 flex justify-between items-center shadow"
    >
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
        <img class="w-5 sm:w-7" src="./../../img/icons/cart.svg" alt="cart" />
      </div>
    </nav>
  </header>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../store";

const user = computed(() => store.state.user.data);

store.dispatch("getUser");
</script>
