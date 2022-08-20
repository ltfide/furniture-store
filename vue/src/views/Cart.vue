<template>
  <div>
    <Notification />
    <header class="border border-b-slate-300">
      <nav
        class="container px-4 sm:px-8 my-5 flex justify-between items-center"
      >
        <div class="flex gap-3 items-center" id="logo">
          <img
            class="w-5 cursor-pointer"
            src="../img/icons/arrow-left.svg"
            alt="arrow-left"
          />
          <router-link :to="{ name: 'Home' }">
            <img class="w-36" src="../img/logo.png" alt="logo" />
          </router-link>
        </div>
      </nav>
    </header>

    <section class="mt-6">
      <div class="container sm:px-32 flex gap-8">
        <div class="p-3 bg-gray-50 rounded w-[70%]">
          <div class="flex gap-3 border-b border-gray-300 pb-2 items-center">
            <input type="checkbox" name="all" id="checkbox" />
            <label for="checkbox" class="text-base text-slate-600"
              >Pilih Semua</label
            >
          </div>
          <div v-for="cart in carts" :key="cart">
            <div
              class="mt-3 flex gap-3 items-center border-b border-gray-300 pb-3"
            >
              <input type="checkbox" />
              <img class="w-24" src="../img/chairs/1.jpg" alt="gambar" />
              <div class="w-full">
                <router-link
                  :to="{ name: 'ProductView', params: { slug: cart.slug } }"
                >
                  <h3 class="text-slate-700 text-base font-medium">
                    {{ cart.title }}
                  </h3>
                </router-link>
                <h5 class="text-sm text-slate-600 mb-3">color: Hitam</h5>
                <div class="flex justify-between items-center">
                  <h3 class="text-slate-700 text-base font-medium">
                    Rp{{ cart.price }}
                  </h3>
                  <div class="flex gap-7 items-center">
                    <div
                      @click="deleteCartItem(cart.id)"
                      class="hover:bg-gray-200 rounded-full cursor-pointer inline"
                    >
                      <img
                        class="p-2"
                        src="../img/icons/delete.svg"
                        alt="delete"
                      />
                    </div>
                    <div
                      class="my-4 border rounded border-green-600 inline-block px-3"
                    >
                      <span>-</span>
                      <input
                        class="text-center"
                        size="1"
                        value="0"
                        type="text"
                      />
                      <span>+</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="p-4 shadow w-[30%] h-[12.5rem]">
          <h3 class="text-slate-600 font-semibold text-base">
            Detail Keranjang
          </h3>
          <div
            class="mt-3 flex justify-between border-b pb-1 border-gray-300 items-center"
          >
            <h3 class="text-slate-500">Total Pesanan</h3>
            <h4 class="text-slate-500">2 Barang</h4>
          </div>
          <div class="mt-4 flex justify-between items-center">
            <h3 class="text-lg text-slate-700 font-semibold">Total Harga</h3>
            <h4 class="text-lg text-slate-700 font-semibold">Rp65.000</h4>
          </div>
          <button
            class="w-full mt-3 text-slate-200 text-base rounded py-3 bg-green-500 hover:bg-green-600"
          >
            Beli
          </button>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import Notification from "../components/Notification.vue";
import { computed } from "@vue/runtime-core";
import store from "../store";

let carts = computed(() => store.state.cart.data);

store.dispatch("getProductCart");

function deleteCartItem(id) {
  const dataId = { id_product: id };
  store.dispatch("deleteCartProduct", dataId).then((res) => {
    store.dispatch("getProductCart");
    return res;
  });
  console.log(id);
}
</script>
