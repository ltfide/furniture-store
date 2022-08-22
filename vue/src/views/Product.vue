<template>
  <div>
    <ProductLoading v-if="loading" />
    <section v-else class="container px-6 sm:px-40 my-10">
      <div class="block sm:flex gap-8">
        <!-- <div class="flex flex-col-reverse sm:flex-row gap-6"> -->
        <!-- <div class="flex justify-center sm:block w-full sm:w-[15%]">
            <img class="w-14 sm:w-full border" src="img/chairs/2.jpg" alt="" />
            <img class="w-14 sm:w-full border" src="img/chairs/3.jpg" alt="" />
          </div> -->
        <!-- </div> -->
        <div class="max-h-96 w-96 overflow-hidden">
          <img
            class="border w-full h-full bg-cover object-cover"
            :src="product.image"
            alt=""
          />
        </div>
        <div class="mt-6 sm:mt-0">
          <h3 class="text-slate-700 text-2xl font-bold">
            {{ product.title }}
          </h3>
          <div class="flex items-center">
            <h4 class="text-base text-slate-700">Terjual .</h4>
            <img class="ml-2 w-4 mr-1" src="../img/icons/star.svg" alt="star" />
            <p class="text-base text-slate-700 mt-1">4.8</p>
            <p class="text-base text-slate-700 mt-1 ml-2">(289 Ulasan)</p>
          </div>
          <div class="mt-4">
            <h3 class="text-2xl text-slate-700 font-bold">
              Rp. {{ discount.toFixed(3) }}
            </h3>
            <div>
              <span
                class="px-1 text-red-500 rounded bg-red-100 mt-1 inline-block"
                >{{ product.discount }}%</span
              >
              <span class="text-sm text-slate-600 ml-3 line-through">{{
                product.price
              }}</span>
            </div>
          </div>
          <div class="w-80 mt-6">
            <h3>Atur Pesanan</h3>
            <div
              class="my-4 border rounded border-green-600 inline-block px-3 select-none"
            >
              <button
                @click="minusItem"
                class="cursor-pointer"
                :disabled="count <= 1"
                :class="count <= 1 ? 'text-gray-400' : ''"
              >
                -
              </button>
              <input
                class="text-center border-none outline-none"
                size="1"
                @input="inputItem"
                :value="count"
                min="1"
                type="text"
              />
              <button
                @click="addItem"
                class="cursor-pointer"
                :disabled="count >= product.stock"
                :class="count >= product.stock ? 'text-gray-400' : ''"
              >
                +
              </button>
            </div>
            <span class="ml-3 select-none">Stock : {{ product.stock }}</span>
            <h4 class="line-through text-slate-500 text-right text-sm">
              {{ total || product.price }}
            </h4>
            <div class="flex justify-between items-center">
              <h5 class="text-slate-700 text-base">Subtotal :</h5>
              <h4 class="text-xl text-slate-800 font-bold">
                Rp. {{ (discount * count).toFixed(3) }}
                <!-- {{
                  total - (total * product.discount) / 100 ||
                  product.price - (product.price * product.discount) / 100
                }} -->
              </h4>
            </div>
            <div class="flex gap-2 justify-between mt-2">
              <button
                class="w-1/2 py-2 rounded border border-green-600 text-green-600"
              >
                Beli
              </button>
              <button
                @click="addCartBtn(product.id)"
                class="w-1/2 py-2 rounded bg-green-600 text-white"
              >
                + Keranjang
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-10">
        <h2
          class="text-slate-700 mb-4 sm:pt-0 pt-5 sm:border-none border-t border-gray-500 text-2xl font-medium"
        >
          Detail Produk & Spesifikasi
        </h2>
        <p>{{ product.detail_product }}</p>
      </div>
    </section>

    <!-- <section class="mt-10">
      <div class="container px-6 sm:px-56">
        <h2
          class="text-slate-700 mb-4 text-2xl font-medium sm:pt-0 pt-5 sm:border-none border-t border-gray-500"
        >
          Ulasan
        </h2>
      </div>
    </section> -->
  </div>
</template>

<script setup>
import ProductLoading from "../components/skeleton/ProductLoading.vue";
import { computed, ref, watch } from "vue";
import { useRoute, useRouter } from "vue-router";
import store from "../store";

const route = useRoute();
const router = useRouter();
const loading = computed(() => store.state.currentProduct.loading);

// // Create empty survey
let product = ref({
  id: null,
  title: "",
  slug: "",
  image: "",
  price: null,
  discount: null,
  stock: null,
  sold: null,
  detail_product: "",
  created: "",
});

const count = ref(1);
const total = ref(0);
let discount = computed(
  () =>
    product.value.price - (product.value.price * product.value.discount) / 100
);

// // Watch to current survey data change and when this happens we update local model
watch(
  () => store.state.currentProduct.data.data,
  (newVal, oldVal) => {
    product.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
);

if (route.params.slug) {
  store.dispatch("getProduct", route.params.slug);
}

function inputItem(e) {
  e.target.value = parseInt(e.target.value) || 0;
  count.value = parseInt(e.target.value) || 0;
  if (e.target.value >= product.value.stock) {
    e.target.value = product.value.stock;
    count.value = product.value.stock;
  }

  if (e.target.value <= 0) {
    e.target.value = 0;
    count.value = 0;
  }
  total.value = count.value * product.value.price;
}

function addItem() {
  count.value++;
  total.value = count.value * product.value.price;
}

function minusItem() {
  count.value--;
  total.value = count.value * product.value.price;
}

function addCartBtn(id) {
  if (!sessionStorage.getItem("TOKEN")) {
    router.push({ name: "Login" });
  }
  const dataId = {
    quantity: count.value,
    product_id: id,
  };
  store.dispatch("addCartProduct", dataId);
  store.dispatch("getCartNotification");
}
</script>
