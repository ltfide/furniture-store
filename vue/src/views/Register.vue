<template>
  <div
    class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
  >
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Daftar Sekarang
        </h2>
      </div>
      <form class="mt-8 space-y-6" @submit="register">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Full Name</label>
            <input
              id="email-address"
              name="fullname"
              type="text"
              required=""
              v-model="user.fullname"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Full Name"
            />
          </div>
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input
              id="email-address"
              name="email"
              type="email"
              autocomplete="email"
              required=""
              v-model="user.email"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Email address"
            />
          </div>
          <div>
            <label for="password" class="sr-only">Password</label>
            <input
              id="password"
              name="password"
              type="password"
              autocomplete="current-password"
              v-model="user.password"
              required=""
              class="appearance-none rounded-none relative block w-full px-3 py-2 rounded-b-md border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password"
            />
          </div>
        </div>

        <div>
          <TButtonLoading
            :loading="loading"
            class="w-full relative justify-center"
          >
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <LockClosedIcon
                class="h-5 w-5 text-green-400 group-hover:text-green-300"
                aria-hidden="true"
              />
            </span>
            Daftar
          </TButtonLoading>
        </div>

        <div class="text-center">
          Sudah terdaftar ?
          <router-link
            to="/login"
            class="font-medium text-green-600 hover:text-green-500"
          >
            Masuk
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import TButtonLoading from "../components/core/TButtonLoading.vue";
import { LockClosedIcon } from "@heroicons/vue/solid";
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "@vue/reactivity";

const router = useRouter();
const user = {
  fullname: "",
  email: "",
  password: "",
};
let loading = ref(false);

function register(ev) {
  ev.preventDefault();

  loading.value = true;
  store
    .dispatch("register", user)
    .then(() => {
      loading.value = false;
      router.push({ name: "Home" });
    })
    .catch((error) => {
      loading.value = false;
    });
}
</script>

<style></style>
