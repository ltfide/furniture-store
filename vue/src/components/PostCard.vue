<template>
  <section class="mt-24">
    <div class="container px-4 sm:px-6">
      <h2 class="text-xl text-slate-600 font-medium">READ BLOG</h2>
      <div class="block sm:grid grid-cols-3 gap-4 mt-6">
        <div
          v-for="item in blogs.data"
          :key="item"
          class="overflow-hidden rounded"
          data-aos="fade-left"
          data-aos-delay="250"
        >
          <img class="rounded" :src="item.image" alt="blog" />
          <p
            class="text-sm text-slate-500 mt-4 font-medium flex items-center gap-2"
          >
            <img class="w-4" src="./../img/icons/calendar.svg" alt="" />
            {{ item.created }}
          </p>
          <h3 class="my-2 leading-[20px] text-lg text-slate-700 font-medium">
            {{ item.title }}
          </h3>
          <p class="text-sm text-slate-500 font-medium">13 menit baca</p>
          <div class="my-2">
            <router-link
              :to="{ name: 'BlogView', params: { slug: item.slug } }"
              class="py-[6px] px-4 inline-block bg-gray-200 text-sm rounded shadow hover:text-slate-100 hover:bg-green-500"
              >Read more..</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
// const { blog } = defineProps({
//   blog: Object,
// });

import store from "../store";
import { computed } from "vue";

const blogLoading = computed(() => store.state.blogs.loading);
const blogs = computed(() => store.state.blogs.data);

store.dispatch("getBlogData");
</script>
