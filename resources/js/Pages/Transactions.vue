<script setup>
import Layout from "./Layout.vue";
import { ref, onMounted } from "vue";

const transactions = ref([]);

onMounted(() => {
  let storedTransactions = JSON.parse(localStorage.getItem("transactions")) || [];

  console.log("Stored Transactions:", storedTransactions); // Debugging

  transactions.value = storedTransactions.filter((txn) => txn.status !== "Pending");

  localStorage.setItem("transactions", JSON.stringify(transactions.value));

  // Debug each transaction
  transactions.value.forEach((txn) => {
    console.log(
      `ID: ${txn.id}, Name: ${txn.name}, Amount: ${txn.amount}, Status: ${txn.status}`
    );
  });
});

const getStatusClass = (status) => {
  return status === "Completed"
    ? "text-green-500"
    : status === "Pending"
    ? "text-yellow-500"
    : "text-red-500";
};
</script>

<template>
  <Layout>
    <Head title="Transactions"></Head>
    <div class="flex flex-col items-center justify-center min-h-[90vh] p-8">
      <h1 class="text-4xl font-bold text-white mb-6 drop-shadow-lg">Transactions</h1>

      <div
        v-if="transactions.length > 0"
        class="w-full max-w-4xl bg-white bg-opacity-20 rounded-lg shadow-lg backdrop-blur-md p-6 overflow-y-auto max-h-[500px]"
      >
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="text-white border-b border-gray-500">
              <th class="p-3">Transaction ID</th>
              <th class="p-3">Product Name</th>
              <th class="p-3">Date</th>

              <th class="p-3">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(txn, index) in transactions"
              :key="index"
              class="hover:bg-gray-800 hover:bg-opacity-30 transition-all"
            >
              <td class="p-3 text-white">{{ txn.id }}</td>
              <td class="p-3 text-gray-300">{{ txn.name }}</td>
              <td class="p-3 text-gray-300">{{ txn.date }}</td>

              <td class="p-3 font-semibold" :class="getStatusClass(txn.status)">
                {{ txn.status }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Show message if no transactions -->
      <p v-else class="text-gray-400 text-lg mt-4">No transactions found.</p>
    </div>
  </Layout>
</template>
