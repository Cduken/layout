import { ref } from "vue";

export const useCart = () => {
  const cart = ref(JSON.parse(localStorage.getItem("cart")) || []);

  const addToCart = (product) => {
    const existingProduct = cart.value.find((item) => item.name === product.name);
    if (existingProduct) {
      existingProduct.quantity += product.quantity;
    } else {
      cart.value.push(product);
    }
    localStorage.setItem("cart", JSON.stringify(cart.value));
  };

  const clearCart = () => {
    cart.value = [];
    localStorage.removeItem("cart");
  };

  return { cart, addToCart, clearCart };
};
