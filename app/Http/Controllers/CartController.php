<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Retrieve cart items associated with the authenticated user
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

        // Pass the cart items to the view
        return view('carts', ['cartItems' => $cartItems]);
    }

    public function update(Request $request, Cart $cartItem)
{
    // Validate the new quantity
    $validatedData = $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    // Update the cart item quantity
    $cartItem->quantity = $validatedData['quantity'];
    $cartItem->save();

    return redirect()->route('carts.index')->with('success', 'Cart updated successfully.');
}


    public function remove(Cart $cartItem)
    {
        // Delete the cart item
        $cartItem->delete();

        return redirect()->route('carts.index')->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {
        // Implement checkout logic here
        // This could include creating an order, processing payment, etc.

        return redirect()->route('carts.index')->with('success', 'Proceed to checkout (functionality to be implemented).');
    }

    public function check(Request $request)
{
    // Lakukan logika untuk memeriksa apakah produk sudah ada di keranjang belanja

    // Misalnya, Anda bisa menggunakan kode berikut untuk mencari item di keranjang berdasarkan product_id
    $existingCartItem = Cart::where('user_id', auth()->id())
        ->where('product_id', $request->product_id)
        ->first();

    // Kemudian Anda bisa mengembalikan respons dalam bentuk JSON
    return response()->json(['exists' => !!$existingCartItem]);
}





}
