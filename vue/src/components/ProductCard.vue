<template>
  <section class="mt-20">
    <div
      class="container px-4 sm:px-8"
      data-aos="zoom-in-up"
      data-aos-delay="50"
    >
      <div class="flex justify-between items-center">
        <h2 class="text-base sm:text-xl text-slate-600 font-medium">
          FEATURE PRODUCTS
        </h2>
        <div class="">
          <ul class="hidden sm:flex">
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              All
            </li>
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              Chairs
            </li>
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              Sofas
            </li>
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              Accessories
            </li>
          </ul>
        </div>
      </div>
      <div v-if="loading" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
        <div v-for="n in 4" :key="n">
          <div class="p-2">
            <div class="h-52 bg-slate-300 w-full"></div>
            <div class="h-5 bg-slate-300 w-full mt-5"></div>
            <div class="h-5 bg-slate-300 w-full mt-2"></div>
          </div>
        </div>
      </div>
      <div v-else class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
        <div v-for="product in products.data" :key="product.id">
          <router-link
            :to="{ name: 'ProductView', params: { slug: product.slug } }"
            class="block p-2 hover:shadow transition cursor-pointer hover:scale-110 relative group"
          >
            <img src="./../img/product-1.jpg" alt="product" />
            <h2 class="mt-3 text-slate-600 text-base">{{ product.title }}</h2>
            <p class="text-slate-800 font-bold my-1">$ {{ product.price }}</p>
            <div class="flex justify-between items-center">
              <!-- <button class="py-[7px] px-4 bg-green-600 inline-block text-xs text-slate-200 rounded shadow hover:bg-green-500 cursor-pointer">ADD TO CART</button> -->
              <div class="flex items-center gap-2">
                <img
                  class="w-3 sm:w-5"
                  src="./../img/icons/star.svg"
                  alt="star"
                />
                <span class="text-xs sm:text-sm text-slate-500"
                  >4.9 | Terjual {{ product.sold }}+</span
                >
              </div>
              <div class="flex gap-2">
                <img
                  class="w-6 cursor-pointer absolute top-4 right-4 hidden group-hover:block"
                  src="./../img/icons/love.svg"
                  alt="love"
                />
                <img
                  class="w-6 cursor-pointer hidden group-hover:block"
                  src="./../img/icons/cart.svg"
                  alt="love"
                />
              </div>
            </div>
          </router-link>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";

const store = useStore();

const loading = computed(() => store.state.products.loading);
const products = computed(() => store.state.products.data);

store.dispatch("getProductData");
</script>
