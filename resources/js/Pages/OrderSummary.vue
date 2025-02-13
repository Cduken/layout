<script setup>
import { defineProps, computed, ref } from "vue";
import { useCart } from "../stores/cart";
import Layout from "./Layout.vue";

const props = defineProps({
  order: Object,
});

const { cart, addToCart } = useCart();
const quantity = ref(1);

const order = computed(
  () =>
    props.order || {
      name: "Unknown",
      price: "-",
      description: "No description available",
      image: "",
    }
);

const addProductToCart = () => {
  if (order.value.name !== "Unknown") {
    const product = {
      name: order.value.name,
      price: order.value.price,
      description: order.value.description,
      image: order.value.image,
      quantity: quantity.value,
    };

    addToCart(product);
    alert(`${order.value.name} added to cart!`);
  }
};
</script>

<template>
  <Layout>
    <Head title="Order"></Head>
    <div class="flex items-center justify-center min-h-[90vh] p-4">
      <div
        class="w-full max-w-3xl bg-transparent border backdrop-blur-md shadow-lg rounded-lg p-6"
      >
        <h1 class="text-2xl md:text-3xl font-bold text-center text-gray-200 mb-4">
          Order Summary
        </h1>

        <div
          v-if="order.name !== 'Unknown'"
          class="flex flex-col md:flex-row items-center md:items-start gap-4"
        >
          <!-- Image Section -->
          <div class="w-full md:w-1/2 flex justify-center">
            <img
              :src="order.image"
              :alt="order.name"
              class="object-cover rounded-lg shadow-2xl w-full max-w-[350px] md:max-w-[400px] h-[180px] md:h-[200px]"
            />
          </div>

          <!-- Text Content Section -->
          <div class="w-full md:w-1/2 text-center md:text-left">
            <h2 class="text-xl md:text-2xl font-semibold text-white">
              {{ order.name }}
            </h2>
            <p class="text-gray-400 mt-2">{{ order.description }}</p>
            <p class="text-lg font-semibold text-gray-200 mt-2">
              Price: <span class="text-green-500">{{ order.price }}</span>
            </p>

            <div class="flex items-center justify-center md:justify-start mt-4">
              <label class="mr-2 text-gray-200 font-medium">Quantity:</label>
              <input
                v-model="quantity"
                type="number"
                min="1"
                class="w-16 p-2 border rounded-lg text-center focus:ring-2 focus:ring-indigo-400"
              />
            </div>

            <button
              @click="addProductToCart"
              class="mt-5 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300 w-full md:w-auto"
            >
              Add to Cart
            </button>
          </div>
        </div>

        <p v-else class="text-center text-red-500">No order found.</p>
      </div>
    </div>
  </Layout>
</template>
