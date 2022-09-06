<template>
  <div
    v-if="notification.show"
    class="fixed w-[300px] left-1/2 -translate-x-1/2 z-10 rounded shadow text-center py-2 px-4 text-white animate-fade-in-down"
    :class="[notification.type === 'success' ? 'bg-emerald-500' : 'bg-red-500']"
  >
    {{ notification.message }}
  </div>
</template>

<script setup>
import { computed } from "vue";
import { useStore } from "vuex";

const store = useStore();

const notification = computed(() => store.state.notification);
</script>

<style></style>
