<template>
  <div>
    <h1>{{ count }}</h1>
    <button @click="increment()">click</button>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../store";

const count = computed(() => store.state.count);

function increment() {
  store.dispatch("increment");
}
</script>
