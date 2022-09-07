<template>
  <vueper-slides
    class="no-shadow"
    :visible-slides="4"
    slide-multiple
    :gap="5"
    :arrows-outside="false"
  >
    <vueper-slide
      v-for="i in 6"
      :key="i"
      :title="i.toString()"
      content="<span class='bg-red-200'>OK</span>"
      class="bg-slate-300 h-10"
    />
  </vueper-slides>
</template>

<script setup>
import { VueperSlides, VueperSlide } from "vueperslides";
const slides = [
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
  {
    title: "Slide #1",
    content: "Slide 1 content.",
  },
  {
    title: "Slide #2",
    content: "Slide 2 content.",
  },
];
</script>

<style>
.vueperslides__bullets {
  display: none !important;
}
</style>
