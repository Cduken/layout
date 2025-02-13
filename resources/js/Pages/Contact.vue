<script setup>
import Layout from "./Layout.vue";
import { ref } from "vue";

const name = ref("");
const email = ref("");
const message = ref("");

const submitForm = () => {
  console.log("Form submitted:", {
    name: name.value,
    email: email.value,
    message: message.value,
  });
};
</script>

<template>
  <Layout>
    <Head title="Contact" />

    <div class="flex flex-col items-center h-[90vh] justify-center">
      <form
        @submit.prevent="submitForm"
        class="bg-transparent backdrop-blur-md p-6 rounded-lg shadow-lg w-full max-w-lg border"
      >
        <h1 class="text-3xl text-center font-bold my-4 text-white">Contact</h1>

        <div class="mb-4">
          <label for="name" class="block text-gray-300 font-bold mb-2">Name</label>
          <input
            type="text"
            id="name"
            v-model="name"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            required
          />
        </div>

        <div class="mb-4">
          <label for="email" class="block text-gray-300 font-bold mb-2">Email</label>
          <input
            type="email"
            id="email"
            v-model="email"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
            required
          />
        </div>

        <div class="mb-4">
          <label for="message" class="block text-gray-300 font-bold mb-2">Message</label>
          <textarea
            id="message"
            v-model="message"
            rows="4"
            class="w-full px-4 py-2 border rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-400"
            required
          ></textarea>
        </div>

        <button
          type="submit"
          class="w-full bg-transparent backdrop-blur-lg border text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300"
        >
          Send Message
        </button>
      </form>
    </div>
  </Layout>
</template>
