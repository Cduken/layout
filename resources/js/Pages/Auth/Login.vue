<script setup>
import { router, useForm } from "@inertiajs/vue3";

const form = useForm({
  email: null,
  password: null,
});

const submit = () => {
  form.post("/login", {
    onSuccess: () => {
      router.replace("/register");
    },
    onError: () => form.reset("password"),
  });
};
</script>

<template>
  <Head title="Login" />

  <div class="flex w-full h-screen items-center justify-center">
    <form
      @submit.prevent="submit"
      class="shadow-2xl rounded-lg p-6 w-[600px] bg-white bg-opacity-20 backdrop-blur-md text-white"
    >
      <h1 class="text-center text-3xl mb-4">Login</h1>

      <div class="mb-6 flex flex-col">
        <label>Email</label>
        <input
          type="email"
          class="rounded-[8px] outline-none p-2 text-black"
          v-model="form.email"
        />
        <small>{{ form.errors.email }}</small>
      </div>

      <div class="mb-6 flex flex-col">
        <label>Password</label>
        <input
          type="password"
          class="rounded-[8px] outline-none p-2 text-black"
          v-model="form.password"
        />
        <small>{{ form.errors.password }}</small>
      </div>

      <div class="mb-4 flex flex-col">
        <p class="mb-4">
          Register an account?
          <a href="/register" class="underline text-blue-200 font-bold">Register</a>
        </p>
        <button
          class="bg-blue-500 text-white px-4 py-2 w-full rounded-[20px] cursor-pointer hover:bg-blue-600 transition duration-300"
        >
          Login
        </button>
      </div>
    </form>
  </div>
</template>
