<script setup>
import { router, useForm } from "@inertiajs/vue3";

const form = useForm({
  name: null,
  email: null,
  password: null,
  password_confirmation: null,
});

const submit = () => {
  form.post("/register", {
    onSuccess: () => {
      router.replace("/login");
    },
    onError: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <Head title="Register" />

  <div class="flex w-full h-screen items-center justify-center">
    <form
      @submit.prevent="submit"
      class="shadow-2xl rounded-lg p-6 w-[600px] bg-white backdrop-blur-md bg-opacity-20 text-white"
    >
      <h1 class="text-center text-3xl mb-4">Register</h1>

      <div class="mb-6 flex flex-col">
        <label>Name</label>
        <input
          type="text"
          class="rounded-[8px] outline-none p-2 text-black"
          v-model="form.name"
        />
        <small>{{ form.errors.name }}</small>
      </div>

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

      <div class="mb-6 flex flex-col">
        <label>Confirm Password</label>
        <input
          type="password"
          class="rounded-[8px] outline-none p-2 text-black"
          v-model="form.password_confirmation"
        />
        <small>{{ form.errors.password_confirmation }}</small>
      </div>

      <div class="mb-4 flex flex-col">
        <p class="mb-4">
          Already a user?
          <a href="/" class="underline text-blue-200 font-bold">Login</a>
        </p>
        <input
          type="submit"
          class="bg-blue-500 text-white px-4 py-2 w-full rounded-[20px] cursor-pointer hover:bg-blue-600 transition duration-300"
          :disabled="form.processing"
        />
      </div>
    </form>
  </div>
</template>
