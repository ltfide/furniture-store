<template>
  <div>
    <Header />
    <Notification />
    <router-view :key="$route.path"></router-view>
    <Footer />
  </div>
</template>

<script setup>
import Header from "./layouts/Header.vue";
import Footer from "./layouts/Footer.vue";
import Notification from "./Notification.vue";
</script>
