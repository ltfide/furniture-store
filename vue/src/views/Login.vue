<template>
  <div
    class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
  >
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Masuk ke Akunmu
        </h2>
      </div>
      <div
        v-if="errorMsg"
        class="flex items-center transition-all duration-1000 justify-between p-3 w-full bg-red-500 text-white rounded shadow"
      >
        <p class="">
          {{ errorMsg }}
        </p>
        <p @click="errorMsg = ''" class="cursor-pointer hover:text-red-100">
          X
        </p>
      </div>
      <form class="mt-8 space-y-6" @submit="login">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input
              id="email-address"
              name="email"
              type="email"
              autocomplete="email"
              required=""
              v-model="user.email"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
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
              required=""
              v-model="user.password"
              class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
              placeholder="Password"
            />
          </div>
        </div>

        <div class="flex items-center justify-end">
          <div class="text-sm">
            <a href="#" class="font-medium text-green-600 hover:text-green-500">
              Lupa Password ?
            </a>
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
            Masuk
          </TButtonLoading>
        </div>

        <div class="text-center">
          Belum punya akun ?
          <router-link
            to="/register"
            class="font-medium text-green-600 hover:text-green-500"
          >
            Daftar
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
  email: "",
  password: "",
};
let loading = ref(false);
let errorMsg = ref("");

function login(ev) {
  ev.preventDefault();

  loading.value = true;
  store
    .dispatch("login", user)
    .then(() => {
      loading.value = false;
      router.push({ name: "Home" });
    })
    .catch((err) => {
      loading.value = false;
      errorMsg.value = err.response.data.message;
    });
}
</script>

<style></style>
