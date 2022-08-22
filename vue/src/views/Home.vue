<template>
  <div>
    <div class="bg-gray-200">
      <div
        class="container block md:flex justify-between items-center"
        data-aos="fade-down"
        data-aos-offset="200"
        data-aos-delay="50"
        data-aos-duration="1000"
        data-aos-easing="ease-in-out"
      >
        <div class="hidden md:block w-1/2 py-10">
          <img class="w-[70%] mx-auto" src="./../img/home-img-2.png" alt="" />
        </div>
        <div
          class="w-full sm:w-full md:w-1/2 mx-auto md:mx-0 py-4 text-center md:text-left"
        >
          <p class="font-medium text-lg sm:text-xl text-slate-700">
            Welcome to our
          </p>
          <h3 class="text-4xl sm:text-5xl md:text-6xl font-bold text-slate-700">
            FURNITURE
          </h3>
          <h3
            class="text-green-500 text-4xl sm:text-5xl md:text-6xl font-medium -mt-3"
          >
            GALLERY
          </h3>
          <p class="font-medium text-lg sm:text-xl text-slate-700">
            Browse our selection
          </p>
          <p class="text-xs sm:text-sm italic text-slate-500">
            By selection a category above
          </p>
          <button
            class="px-4 py-2 bg-green-500 text-white rounded my-5 text-xs sm:text-base hover:opacity-80"
          >
            View Collection
          </button>
        </div>
      </div>
    </div>
    <section class="bg-white border-b border-gray-300">
      <div class="container flex justify-center">
        <div class="flex gap-2 items-center border-x py-2 px-4">
          <img class="w-10" src="./../img/icons/table.svg" alt="tables" />
          <span class="hidden sm:block text-sm text-slate-500">Tables</span>
        </div>
        <div class="flex gap-2 items-center border-x py-2 px-4">
          <img class="w-10" src="./../img/icons/chair.svg" alt="tables" />
          <span class="hidden sm:block text-sm text-slate-500">Chairs</span>
        </div>
        <div class="flex gap-2 items-center border-x py-2 px-4">
          <img class="w-10" src="./../img/icons/light.svg" alt="tables" />
          <span class="hidden sm:block text-sm text-slate-500">Light</span>
        </div>
        <div class="flex gap-2 items-center border-x py-2 px-4">
          <img class="w-10" src="./../img/icons/sofa.svg" alt="tables" />
          <span class="hidden sm:block text-sm text-slate-500">Sofa</span>
        </div>
        <div class="flex gap-2 items-center border-x py-2 px-4">
          <img class="w-10" src="./../img/icons/mirror.svg" alt="tables" />
          <span class="hidden sm:block text-sm text-slate-500"
            >Accessories</span
          >
        </div>
      </div>
    </section>

    <section class="mt-14">
      <div class="sm:container gap-4 block md:flex justify-center">
        <div
          class="w-full md:w-1/2 flex justify-center md:justify-start items-center bg-[#F2F2F2] rounded overflow-hidden"
          data-aos="fade-right"
          data-aos-delay="50"
        >
          <img
            class="w-44 sm:w-40 md:w-72"
            src="./../img/product-4.jpg"
            alt=""
          />
          <div>
            <h3 class="text-slate-700 text-xs sm:text-base">Design Chairs</h3>
            <h2
              class="text-orange-600 pb-3 text-sm sm:text-xl border-b border-gray-400 uppercase font-bold"
            >
              C h a i r s Z e b r a
            </h2>
            <p
              class="mt-3 text-slate-500 italic font-medium text-xs sm:text-sm"
            >
              Lorem ipsum dolor sit amet.
            </p>
            <div
              class="mt-3 bg-white rounded shadow inline-block text-xs sm:text-sm text-slate-700 py-2 px-3 hover:bg-slate-200 cursor-pointer"
            >
              Show Now
            </div>
          </div>
        </div>
        <div
          class="w-full mt-4 sm:mt-0 sm:w-1/2 bg-[#f2f2f2] rounded overflow-x-hidden"
          data-aos="fade-left"
          data-aos-delay="50"
        >
          <div class="text-center mt-5">
            <h3 class="text-orange-600 text-sm sm:text-xl uppercase font-bold">
              C h a i r s
            </h3>
            <p class="text-slate-600 text-sm sm:text-base">
              Lorem ipsum dolor sit amet consectetur.
            </p>
          </div>
          <div class="flex w-full justify-center">
            <img
              class="w-24 sm:w-44"
              src="./../img/product-6.jpg"
              alt="product"
            />
            <img
              class="w-24 sm:w-44"
              src="./../img/product-7.jpg"
              alt="product"
            />
            <img
              class="w-24 sm:w-44"
              src="./../img/product-8.jpg"
              alt="product"
            />
          </div>
        </div>
      </div>
    </section>

    <ProductCard />

    <section
      class="bg-[#f2f2f2] mt-24 bg-top bg-fixed"
      style="background-image: url('./../img/about-img.jpg')"
    >
      <div class="container text-center py-14">
        <div class="w-full sm:w-1/2 mx-auto text-center">
          <h3 class="text-3xl font-bold text-green-600 uppercase">
            Login For 20% Discount
          </h3>
          <p class="my-6 text-slate-200 text-base">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nisi
            sunt repellat inventore minima? Quo.
          </p>
          <router-link
            to="/login"
            class="px-7 py-1 rounded cursor-pointer text-slate-100 bg-green-500 hover:bg-green-400"
          >
            Login
          </router-link>
        </div>
      </div>
    </section>
    <router-link to="/review">review</router-link>

    <PostCard />
  </div>
</template>

<script setup>
import ProductCard from "../components/ProductCard.vue";
import PostCard from "../components/PostCard.vue";
</script>

<style></style>
