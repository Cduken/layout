<template>
  <div
    class="flex bg-transparent backdrop-blur-lg p-4 rounded-lg shadow-lg relative h-[200px] hover:scale-105 transition duration-300 hover:border"
  >
    <!-- Image Section -->
    <div class="w-[50%] h-full rounded-lg overflow-hidden">
      <img
        :src="`/images/${product.image}`"
        alt="Product Image"
        class="w-full h-full object-cover rounded-lg"
        v-if="product.image"
      />
      <div
        v-else
        class="w-full h-full flex items-center justify-center bg-gray-700 text-white"
      >
        No Image
      </div>
    </div>

    <!-- Product Details -->
    <div class="w-[50%] flex flex-col justify-center pl-4">
      <h2 class="text-lg font-semibold text-[orangered]">{{ product.name }}</h2>
      <p class="text-green-500 font-semibold">
        Price: <span class="text-white font-bold">₱{{ formatPrice(product.price) }}</span>
      </p>
      <p class="text-white text-sm line-clamp-3 product-description">
        {{ product.description }}
      </p>

      <!-- Order Button -->
      <button
        @click="orderProduct"
        class="mt-4 flex items-center justify-center rounded-lg bg-transparent backdrop-blur-lg border p-2 text-white hover:bg-blue-700 transition duration-300 hover:text-gray-300"
      >
        Order Here
        <i class="bx bx-right-arrow-alt text-2xl"></i>
      </button>
    </div>
  </div>
</template>

<script setup>
import { defineProps, ref, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
  product: {
    type: Object,
    required: true,
  },
});

// Load transactions from localStorage
const transactions = ref([]);

onMounted(() => {
  const storedTransactions = localStorage.getItem("transactions");
  transactions.value = storedTransactions ? JSON.parse(storedTransactions) : [];
});

// Format price to have commas
const formatPrice = (price) => {
  return parseFloat(price).toLocaleString("en-PH", { minimumFractionDigits: 2 });
};

// Function to add order to transactions
const orderProduct = () => {
  const newTransaction = {
    id: `TXN-${Math.floor(Math.random() * 100000)}`,
    date: new Date().toISOString().split("T")[0],
    amount: props.product.price,
    status: "Pending",
  };

  transactions.value.push(newTransaction);
  localStorage.setItem("transactions", JSON.stringify(transactions.value));

  Inertia.visit("/order-summary", {
    method: "get",
    data: { order: props.product },
  });
};
</script>

<style scoped>
.product-description {
  display: -webkit-box;
  -webkit-line-clamp: 3; /* Limits to 3 lines */
  -webkit-box-orient: vertical;
  overflow: hidden;
  white-space: normal;
}
</style>
