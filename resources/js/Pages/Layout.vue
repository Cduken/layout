<script setup>
import { ref } from "vue";
import { useCart } from "../stores/cart";

const isOpen = ref(false);
const { cart } = useCart();
</script>

<template>
  <div>
    <nav
      class="flex w-full py-4 justify-between items-center relative backdrop-blur-sm shadow-lg"
    >
      <div
        class="text-gray-200 text-[25px] mx-4 uppercase font-bold cursor-pointer tracking-wider"
      >
        .Cdu<span class="text-[orangered] hover:text">ken</span>
      </div>

      <div class="hidden md:flex text-white mx-4 gap-5">
        <Link href="/home" class="link">Home</Link>
        <Link href="/products" class="link">Products</Link>
        <Link href="/transactions" class="link">Transactions</Link>
        <Link href="/FAQ" class="link">FAQ</Link>
        <Link href="/contact" class="link">Contact</Link>
      </div>
      <div class="flex items-center justify-center">
        <Link href="/cart" class="hidden md:block relative">
          <i
            class="bx bx-cart text-2xl text-white hover:text-[orangered] transition duration-300"
          >
            <span v-if="cart.length > 0" class="cart-count">{{ cart.length }}</span>
          </i>
        </Link>

        <Link
          href="/"
          class="hidden md:flex text-white mx-7 font-bold items-center bg-[orangered] hover:bg-[#FF2D20] transition duration-300 px-4 rounded-md h-[30px]"
          >Logout</Link
        >
      </div>

      <button @click="isOpen = !isOpen" class="md:hidden mx-4 text-white text-2xl">
        &#9776;
      </button>
    </nav>

    <div
      v-if="isOpen"
      class="md:hidden flex flex-col items-center bg-gradient-to-b from-purple-500 to-pink-500 text-white py-4 rounded-sm mt-[-4px] rounded-b-lg"
    >
      <Link
        href="/home"
        class="py-2 hover:text-[orangered] transition duration-300"
        @click="isOpen = false"
        >Home</Link
      >
      <Link
        href="/products"
        class="py-2 hover:text-[orangered] transition duration-300"
        @click="isOpen = false"
        >Products</Link
      >
      <Link
        href="/transactions"
        class="py-2 hover:text-[orangered] transition duration-300"
        @click="isOpen = false"
        >Transactions</Link
      >
      <Link
        href="/FAQ"
        class="py-2 hover:text-[orangered] transition duration-300"
        @click="isOpen = false"
        >FAQ</Link
      >
      <Link
        href="/contact"
        class="py-2 hover:text-[orangered] transition duration-300"
        @click="isOpen = false"
        >Contact</Link
      >
      <Link href="/cart"
        ><i
          class="bx bx-cart text-2xl text-white hover:text-[orangered] transition duration-300"
          @click="isOpen = false"
        ></i
      ></Link>

      <Link
        href="/"
        class="py-2 bg-[orangered] px-4 font-bold rounded-md hover:bg-red-700 transition duration-300"
        @click="isOpen = false"
        >Logout</Link
      >
    </div>

    <slot />
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

body {
  font-family: "Poppins", sans-serif;
  background: url("/public/images/wall-wallpaper-concrete-colored-painted-textured-concept.jpg");
  background-repeat: no-repeat;
  background-size: cover;
}

.link {
  position: relative;
  text-decoration: none;
  transition: all 0.2s ease-in-out;
}

.link::before,
.link::after {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: #fff;
  bottom: 0;
  left: 0;
  transform: scaleX(0);
  transition: transform 0.3s ease-in-out;
}

.link:hover::before,
.link:hover::after {
  transform: scaleX(1);
}

.cart-count {
  position: absolute;
  top: -6px; /* Adjusted to align properly */
  right: -10px; /* Adjusted so it stays in the right place */
  background: red;
  color: white;
  font-size: 12px;
  font-weight: bold;
  border-radius: 50%;
  padding: 3px 7px;
  min-width: 20px;
  text-align: center;
}
</style>
