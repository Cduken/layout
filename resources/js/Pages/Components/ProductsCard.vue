<template>
  <div
    class="flex bg-transparent backdrop-blur-lg p-4 rounded-lg shadow-lg relative h-[200px] hover:scale-105 transition duration-300 hover:border"
  >
    <div class="w-[50%] h-full rounded-lg overflow-hidden">
      <img
        :src="product.image"
        alt="Product Image"
        class="w-full h-full object-cover rounded-lg"
      />
    </div>

    <div class="w-[50%] flex flex-col justify-center pl-4">
      <h2 class="text-lg font-semibold text-[orangered]">{{ product.name }}</h2>
      <p class="text-white">Price: {{ product.price }}</p>
      <p class="text-white text-sm line-clamp-3">
        {{ product.description }}
      </p>

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

const props = defineProps({ product: Object });

// Load transactions from localStorage
const transactions = ref([]);
onMounted(() => {
  transactions.value = JSON.parse(localStorage.getItem("transactions")) || [];
});

// Function to add order to transactions
const orderProduct = () => {
  const newTransaction = {
    id: `TXN-${Math.floor(Math.random() * 100000)}`, // Unique transaction ID
    date: new Date().toISOString().split("T")[0], // Current date
    amount: props.product.price,
    status: "Pending", // Default to pending
  };

  transactions.value.push(newTransaction);
  localStorage.setItem("transactions", JSON.stringify(transactions.value)); // Persist transactions

  Inertia.visit("/order-summary", { method: "get", data: { order: props.product } });
};
</script>
