<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cart;

class CartController extends Controller
{
    // Fetch cart items and return an Inertia response
    public function index()
    {
        $cartItems = Cart::all();

        return Inertia::render('Cart', [
            'cartItems' => $cartItems
        ]);
    }

    // Store cart item in the database
    public function store(Request $request)
    {
        $cart = Cart::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }

    // Delete a cart item
    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }

    // Clear all cart items
    public function clear()
    {
        Cart::truncate();
        return redirect()->route('cart.index')->with('success', 'Cart cleared');
    }
}
