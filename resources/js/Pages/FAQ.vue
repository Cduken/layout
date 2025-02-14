<script setup>
import Layout from "./Layout.vue";
import { ref } from "vue";

const faqs = ref([
  {
    question: "What is CDUKEN?",
    answer: "CDU KEN is an innovative platform offering premium products and services.",
    open: false,
  },
  {
    question: "How can I purchase?",
    answer: "You can purchase by adding items to your cart and proceeding to checkout.",
    open: false,
  },
  {
    question: "Do you offer refunds?",
    answer: "Yes, we have a 7-day refund policy for eligible products.",
    open: false,
  },
]);

const toggleFAQ = (index) => {
  faqs.value[index].open = !faqs.value[index].open;
};
</script>

<template>
  <Layout>
    <Head title="FAQ" />

    <div class="flex flex-col items-center justify-center min-h-[90vh] p-8">
      <h1 class="text-4xl font-bold text-white mb-6 drop-shadow-lg">
        Frequently Asked Questions
      </h1>

      <div class="w-full max-w-2xl">
        <div
          v-for="(faq, index) in faqs"
          :key="index"
          class="mb-4 p-4 bg-white bg-opacity-20 rounded-lg shadow-lg backdrop-blur-md transition-transform transform hover:scale-105"
        >
          <button
            class="w-full text-lg font-semibold text-white flex justify-between items-center"
            @click="toggleFAQ(index)"
          >
            <span>{{ faq.question }}</span>
            <span
              :class="faq.open ? 'rotate-180' : 'rotate-0'"
              class="transition-transform transform duration-300"
              >▼</span
            >
          </button>
          <p v-if="faq.open" class="mt-2 text-gray-200">{{ faq.answer }}</p>
        </div>
      </div>
    </div>
  </Layout>
</template>

<style></style>
