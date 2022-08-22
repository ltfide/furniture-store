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
            <li>
              <a
                href="#"
                @click="getProductByCategory"
                class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500 block"
                >All</a
              >
            </li>
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              <button @click="getProductByCategory($event, 'chair')">
                Chairs
              </button>
            </li>
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              <button @click="getProductByCategory($event, 'sofa')">
                Sofas
              </button>
            </li>
            <li
              class="text-slate-500 text-base cursor-pointer hover:bg-slate-100 py-1 px-5 hover:text-green-500"
            >
              <button @click="getProductByCategory($event, 'accessories')">
                Accessories
              </button>
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
        <div
          class="block p-2 hover:shadow transition cursor-pointer hover:scale-110 relative group"
          v-for="product in products.data"
          :key="product.id"
        >
          <router-link
            :to="{ name: 'ProductView', params: { slug: product.slug } }"
          >
            <img
              class="max-h-64 bg-cover bg-center w-full"
              :src="product.image"
              alt="product"
            />
          </router-link>
          <div class="absolute top-0 px-4 py-1 text-slate-700 bg-green-200">
            {{ product.category.name }}
          </div>
          <router-link
            :to="{ name: 'ProductView', params: { slug: product.slug } }"
          >
            <h2
              class="mt-3 text-slate-600 text-base group-hover:text-green-500"
            >
              {{ product.title }}
            </h2>
          </router-link>

          <p class="text-slate-800 font-bold my-1 cursor-default">
            $ {{ product.price }}
          </p>
          <div class="flex justify-between items-center">
            <div class="flex items-center gap-2 cursor-default">
              <img
                class="w-3 sm:w-5"
                src="./../img/icons/star.svg"
                alt="star"
              />
              <span class="text-xs sm:text-sm text-slate-500"
                >4.9 | Terjual {{ product.sold }}+</span
              >
            </div>
            <div
              class="flex gap-2 hover:bg-gray-200 rounded-full p-2"
              @click="addCartBtn(product.id)"
            >
              <img
                class="w-6 cursor-pointer hidden group-hover:block"
                src="./../img/icons/cart.svg"
                alt="love"
              />
            </div>
          </div>
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

function addCartBtn(id) {
  const dataId = { id_product: id };
  store.dispatch("addCartProduct", dataId);
  store.dispatch("getUser");
}

function getProductByCategory(ev, query) {
  ev.preventDefault();
  console.log(query);
  store.dispatch("getProductData", {
    url: query != undefined ? `products/?category=${query}` : "",
  });
}
</script>
