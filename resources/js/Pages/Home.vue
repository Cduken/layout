<script setup>
import Layout from "./Layout.vue";
</script>

<template>
  <Layout>
    <Head title="Home" />

    <div class="relative flex flex-col items-center justify-center h-[90vh] text-center">
      <div class="relative z-10 p-6">
        <h1 class="text-5xl font-extrabold text-white drop-shadow-lg animate-fade-in">
          Welcome to .CDUKEN
        </h1>
        <p class="mt-4 text-lg text-gray-200 animate-fade-in delay-200">
          Discover the best products and services with us!
        </p>

        <Link href="/products">
          <button
            class="mt-6 px-6 py-3 bg-orange-500 text-white font-bold rounded-lg shadow-md hover:bg-orange-600 transition-all duration-300 animate-bounce"
          >
            Explore Now
          </button>
        </Link>
      </div>
    </div>
  </Layout>
</template>

<style>
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
.animate-fade-in {
  animation: fade-in 1s ease-out forwards;
}
</style>
