<script setup>
import Layout from "./Layout.vue";
import ProductsCard from "./Components/ProductsCard.vue";
import { ref } from "vue";

const products = ref([
  {
    name: "Saging",
    price: "$10",
    description: "A sweet and nutritious fruit, perfect for snacks or desserts.",
    image: "/images/360_F_857216169_pOIbsMZ8vzuvoEzPtCv73wGIMTtTn7M3.webp",
  },
  {
    name: "Ginamos",
    price: "$20",
    description:
      "A traditional Filipino fermented fish paste, commonly used as a savory condiment.",
    image: "/images/NSC_Ginamos_Article_10222023_89.webp",
  },
  {
    name: "Suka",
    price: "$30",
    description:
      "A popular Filipino vinegar made from fermented coconut or sugarcane, great for dipping sauces and marinades.",
    image:
      "/images/vinaigre-de-datu-puti-camarines-sur-philippines-janv-une-photo-en-gros-plan-marque-célèbre-au-aux-construites-par-nutriasia-152063161.webp",
  },
  {
    name: "Sibuyas",
    price: "$30",
    description:
      "Fresh red or white onions, essential for adding flavor to a variety of dishes.",
    image: "/images/fresh-onion.webp",
  },
  {
    name: "Sili",
    price: "$30",
    description:
      "Spicy chili peppers that add heat and flavor to many Filipino and Asian dishes.",
    image: "/images/vibrant-red-pepper.webp",
  },
  {
    name: "Luy-a",
    price: "$30",
    description:
      "Fresh ginger root, known for its aromatic and spicy flavor, commonly used in soups, teas, and stir-fries.",
    image: "/images/ginger-pictures-5gog7qtsj35k75n8.webp",
  },
  {
    name: "Batong",
    price: "$30",
    description:
      "Fresh green beans, great for stir-fried dishes, soups, and side dishes.",
    image: "/images/fresh-green-beans-white_99293-962.webp",
  },
  {
    name: "Kamatis",
    price: "$30",
    description:
      "Juicy and ripe tomatoes, perfect for salads, sauces, and Filipino dishes like sinigang.",
    image: "/images/tomato.webp",
  },
  {
    name: "Talong",
    price: "$30",
    description: "Fresh eggplants, ideal for grilling, frying, or making tortang talong.",
    image: "/images/eggplant.webp",
  },

  {
    name: "Fries",
    price: "$10",
    description: "A popular fast food item in the Philippines",
    image:
      "/images/French fries 3d icon transparent background _ Premium AI-generated image.jpg",
  },

  {
    name: "Creatine",
    price: "$50",
    description: "A popular pre-workout supplement",
    image: "/images/creatine.webp",
  },

  {
    name: "Whey Protein",
    price: "$100",
    description:
      "A popular pre-workout supplement to achieve your protein intake everyday.",
    image: "/images/whey.webp",
  },
]);
</script>

<template>
  <Layout>
    <Head title="Products" />

    <h1 class="text-3xl p-6 font-bold mb-[-20px] text-white">All Products</h1>
    <div
      class="grid grid-cols-1 overflow-y-auto max-h-[600px] sm:grid-cols-2 md:grid-cols-3 gap-6 p-6"
    >
      <ProductsCard
        v-for="(product, index) in products"
        :key="index"
        :product="product"
      />
    </div>
  </Layout>
</template>
