<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart_spare;
use App\Models\Cart;



class Cart_spareController extends Controller
{
    public function index()
{
    $cartSpareparts = Cart_spare::where('user_id', auth()->id())->with('sparepart')->get();
    $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    return view('carts', ['cartItems' => $cartItems, 'cartSpareparts' => $cartSpareparts]);
}

    
    public function update(Request $request, Cart_spare $cartSparepart)
    {
        // Validate the new quantity
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
    
        // Update the cart item quantity
        $cartSparepart->quantity = $validatedData['quantity'];
        $cartSparepart->save();
    
        return redirect()->route('carts.index')->with('success', 'Cart updated successfully.');
    }


    public function remove(Cart_spare $cartSparepart)
    {
        // Delete the cart item
        $cartSparepart->delete();

        return redirect()->route('carts.index')->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {

        return redirect()->route('carts.index')->with('success', 'Proceed to checkout (functionality to be implemented).');
    }

    public function check_spare(Request $request)
    {
        // Check if the spare part already exists in the user's cart
        $existingCartItem = Cart_spare::where('user_id', auth()->id())
            ->where('sparepart_id', $request->sparepart_id)
            ->first();
    
        // Return JSON response indicating whether the spare part exists in the cart
        return response()->json(['exists' => !!$existingCartItem]);
    }
    

    
}
