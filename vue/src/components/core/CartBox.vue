<template>
  <div class="relative cursor-pointer group" @mouseenter="getCartData">
    <img
      class="w-5 p-1 sm:w-7 hover:bg-gray-200 rounded-md"
      src="./../../img/icons/cart.svg"
      alt="cart"
    />
    <div
      class="absolute -top-2 -right-3 bg-red-500 text-white text-sm border-2 border-white w-6 h-6 text-center rounded-full"
    >
      {{ props.totalCart }}
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
      <div class="flex justify-end cursor-default">
        <router-link
          to="/cart"
          class="px-2 mb-1 text-green-500 text-right mr-2 hover:underline"
          >Cart</router-link
        >
      </div>
      <div v-for="cart in carts" :key="cart.id">
        <router-link
          to="/cart"
          class="relative flex gap-4 items-center px-2 py-1 border-t border-gray-300 hover:bg-gray-100"
        >
          <img
            class="max-h-10 rounded"
            :src="cart.data.product_image"
            alt="img"
          />
          <div class="text-slate-600 text-sm">
            <h3>{{ cart.data.title }}</h3>
            <h5 class="text-green-500">Rp{{ cart.data.price }}</h5>
          </div>
          <div class="absolute top-1/2 right-4 -translate-y-1/2 text-slate-600">
            ({{ cart.quantity }})
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
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../store";

const props = defineProps({
  totalCart: Number,
});

const carts = computed(() => store.state.cart.data);
const cartLoading = computed(() => store.state.cart.loading);

function getCartData() {
  console.log("OK");
  store.dispatch("getProductCart");
}
</script>
