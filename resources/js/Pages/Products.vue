<script setup>
import Layout from "./Layout.vue";
import ProductsCard from "./Components/ProductsCard.vue";
import { ref } from "vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";

// Fetch products from Laravel
const products = usePage().props.products;

// Modal State
const showModal = ref(false);

// Form Data using Inertia Form
const form = useForm({
  name: "",
  price: "",
  description: "",
  image: null,
});

// Open Modal
const openModal = () => {
  showModal.value = true;
};

// Close Modal
const closeModal = () => {
  showModal.value = false;
  form.reset();
};

// Handle File Upload
const handleFileUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    form.image = file;
  }
};

// Add Product (Using Inertia)
const addProduct = () => {
  form.post("/products", {
    forceFormData: true,
    onSuccess: () => {
      closeModal();
      Inertia.visit("/products");
    },
    onError: (errors) => {
      alert("Error adding product: " + JSON.stringify(errors));
    },
  });
};
</script>

<template>
  <Head title="Products" />
  <Layout>
    <h1 class="text-3xl p-6 font-bold mb-[-20px] text-white text-center">All Products</h1>

    <button
      @click="openModal"
      class="bg-blue-500 text-white px-4 py-2 rounded-lg m-6 hover:bg-blue-700"
    >
      + Add Product
    </button>

    <div
      class="overflow-y-auto max-h-[500px] grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 p-6"
    >
      <ProductsCard v-for="product in products" :key="product.id" :product="product" />
    </div>

    <div
      v-if="showModal"
      class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
    >
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Add New Product</h2>

        <!-- Form -->
        <form @submit.prevent="addProduct" enctype="multipart/form-data">
          <label>Name:</label>
          <input v-model="form.name" type="text" class="w-full p-2 border rounded mb-2" />

          <label>Price:</label>
          <input
            v-model="form.price"
            type="text"
            class="w-full p-2 border rounded mb-2"
          />

          <label>Description:</label>
          <textarea
            v-model="form.description"
            class="w-full p-2 border rounded mb-2"
          ></textarea>

          <label>Upload Image:</label>
          <input
            type="file"
            accept="image/*"
            @change="handleFileUpload"
            class="w-full p-2 border rounded mb-2"
          />

          <div class="flex justify-end space-x-2 mt-4">
            <button
              type="button"
              @click="closeModal"
              class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-600"
            >
              Cancel
            </button>
            <button
              type="submit"
              class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700"
            >
              Add
            </button>
          </div>
        </form>
      </div>
    </div>
  </Layout>
</template>
