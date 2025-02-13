<script setup>
import { ref, onMounted } from "vue";
import { useCart } from "../stores/cart";
import Layout from "./Layout.vue";

const { cart, clearCart } = useCart();

const transactions = ref([]);

// Load previous transactions when component is mounted
onMounted(() => {
  transactions.value = JSON.parse(localStorage.getItem("transactions")) || [];
});

const checkoutItem = (index) => {
  if (index >= 0 && index < cart.value.length) {
    const checkedOutItem = cart.value[index];

    // Make sure price & quantity are numbers
    const amount = Number(checkedOutItem.quantity) * Number(checkedOutItem.price);

    // Debug
    console.log(`Checking out: ${checkedOutItem.name}, Amount: ${amount}`);

    // Create transaction entry
    const transaction = {
      id: `TXN-${Date.now()}`,
      name: checkedOutItem.name,
      amount: amount, // Ensure it's a number
      date: new Date().toLocaleString(),
      status: "Completed",
    };

    transactions.value.push(transaction);
    localStorage.setItem("transactions", JSON.stringify(transactions.value));

    // Remove item from cart
    cart.value.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart.value));

    alert(`${checkedOutItem.name} checked out!`);
  }
};

// Remove a single item
const removeItem = (index) => {
  if (index >= 0 && index < cart.value.length) {
    const removedItem = cart.value[index];

    // Create transaction entry
    const transaction = {
      id: `TXN-${Date.now()}`,
      name: removedItem.name,
      amount: removedItem.quantity * removedItem.price,
      date: new Date().toLocaleString(),
      status: "Canceled",
    };

    // Add transaction
    transactions.value.push(transaction);
    localStorage.setItem("transactions", JSON.stringify(transactions.value));

    // Remove the item from the cart
    cart.value.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart.value));

    alert(`"${removedItem.name}" has been removed from the cart.`);
  }
};

// Clear entire cart
const clearCartHandler = () => {
  clearCart();
  localStorage.removeItem("cart");
};
</script>

<template>
  <Layout>
    <Head title="Cart" />
    <div
      class="max-w-[90%] mx-auto mt-10 shadow-lg h-[100vh] rounded-lg p-6 overflow-y-auto max-h-[600px]"
    >
      <h1 class="text-3xl ml-4 font-bold text-gray-200 mb-4">Shopping Cart</h1>

      <div
        v-if="cart.length > 0"
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-4"
      >
        <div
          v-for="(item, index) in cart"
          :key="index"
          class="flex bg-transparent backdrop-blur-lg p-4 gap-3 rounded-lg shadow-lg relative h-[200px] hover:scale-105 transition duration-300 hover:border"
        >
          <img
            :src="item.image"
            :alt="item.name"
            class="w-[50%] h-[100%] object-cover rounded-lg"
          />

          <div class="flex-1">
            <strong class="block text-lg text-gray-300">{{ item.name }}</strong>
            <span class="text-gray-200 block"
              >{{ item.quantity }} x {{ item.price }}</span
            >

            <div class="flex flex-col gap-2 mt-4">
              <button
                @click="checkoutItem(index)"
                class="bg-transparent backdrop-blur-lg border text-white font-bold px-3 py-1 rounded-md hover:bg-green-600 transition duration-300"
              >
                Checkout
              </button>

              <button
                @click="removeItem(index)"
                class="bg-red-500 border text-white px-3 py-1 rounded-md hover:bg-transparent transition duration-300"
              >
                Remove
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Clear Cart Button -->
      <div v-if="cart.length > 0" class="text-center mt-6">
        <button
          @click="clearCartHandler"
          class="bg-transparent backdrop-blur-lg border text-white font-bold px-4 py-2 rounded-md hover:bg-gray-800 transition duration-300"
        >
          Clear Cart
        </button>
      </div>

      <p v-else class="text-center text-gray-500">Your cart is empty.</p>
    </div>
  </Layout>
</template>
