<template>
  <div>
    <router-link :to="{ name: 'ProductView', params: { slug: product.slug } }">
      <img
        class="max-h-64 bg-cover bg-center w-full"
        :src="product.image"
        alt="product"
      />
    </router-link>
    <div class="absolute top-0 px-4 py-1 text-slate-700 bg-green-200">
      {{ product.category.name }}
    </div>
    <router-link :to="{ name: 'ProductView', params: { slug: product.slug } }">
      <h2 class="mt-3 text-slate-600 text-base group-hover:text-green-500">
        {{ product.title }}
      </h2>
    </router-link>

    <p class="text-slate-800 font-bold my-1 cursor-default">
      $ {{ product.price }}
    </p>
    <div class="flex justify-between items-center">
      <div class="flex items-center gap-2 cursor-default">
        <img class="w-3 sm:w-5" src="./../img/icons/star.svg" alt="star" />
        <span class="text-xs sm:text-sm text-slate-500"
          >4.9 | Terjual {{ product.sold }}+</span
        >
      </div>
      <div class="flex gap-2 hover:bg-gray-200 rounded-full p-2">
        <img
          class="w-6 cursor-pointer hidden group-hover:block"
          src="./../img/icons/cart.svg"
          alt="love"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  product: Object,
});
</script>
