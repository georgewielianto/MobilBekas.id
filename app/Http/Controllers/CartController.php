<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Cart_spare;
use App\Models\Checkout;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
        $cartSpareparts = Cart_spare::where('user_id', auth()->id())->with('sparepart')->get();
        $totalPriceAll = $this->calculateTotalPrice($cartItems, $cartSpareparts);

        return view('carts', ['cartItems' => $cartItems, 'cartSpareparts' => $cartSpareparts, 'totalPriceAll' => $totalPriceAll]);
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
        $userId = auth()->id();
        
        // Retrieve cart items for the user
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        $cartSpareparts = Cart_spare::where('user_id', $userId)->with('sparepart')->get();

        // Save checkout information
        foreach ($cartItems as $cartItem) {
            Checkout::create([
                'user_id' => $userId,
                'product_name' => $cartItem->product->name,
                'category' => 'car'
            ]);
        }

        foreach ($cartSpareparts as $cartSparepart) {
            Checkout::create([
                'user_id' => $userId,
                'product_name' => $cartSparepart->sparepart->name,
                'category' => 'sparepart'
            ]);
        }

        // Clear the cart for the user
        Cart::where('user_id', $userId)->delete();
        Cart_spare::where('user_id', $userId)->delete();

        // Redirect to the home page with a success message
        return redirect()->route('home')->with('success', 'Checkout completed successfully!');

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
    public function calculateTotalPrice($cartItems, $cartSpareparts)
    {
        $totalPriceAll = 0;

        // Hitung total harga untuk "Car"
        foreach ($cartItems as $cartItem) {
            $itemTotal = $cartItem->product->price * $cartItem->quantity;
            $totalPriceAll += $itemTotal;
        }

        // Hitung total harga untuk "Spareparts"
        foreach ($cartSpareparts as $cartSparepart) {
            $itemTotal = $cartSparepart->sparepart->price * $cartSparepart->quantity;
            $totalPriceAll += $itemTotal;
        }

        return $totalPriceAll;
    }
}
