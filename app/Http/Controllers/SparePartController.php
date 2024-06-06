<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Models\Cart_spare; 
use App\Models\Product;

class SparePartController extends Controller
{
    
    public function destroy($id)
    {
        $sparepart = SparePart::find($id);
        if (!$sparepart) {
            return redirect()->back()->with('error', 'Spare part not found');
        }
        $sparepart->delete();
        return redirect()->back()->with('success', 'Spare part deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

        SparePart::create([
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Spare part added successfully');
    }

    public function edit(SparePart $sparepart)
    {
        return view('edit_spare', compact('sparepart'));
    }

    public function update(Request $request, SparePart $sparepart)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        ]);

        $sparepart->name = $request->name;
        $sparepart->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $sparepart->image = $imageName;
        }

        $sparepart->save();

        return redirect()->route('home')->with('success', 'Spare part updated successfully');
    }

    public function addToCart(Request $request, Sparepart $sparepart)
{
    // Ensure the user is authenticated
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to be logged in to add items to the cart.');
    }

    // Check if the spare part is already in the cart
    $existingCartItem = Cart_spare::where('user_id', auth()->id())
        ->where('sparepart_id', $sparepart->id)
        ->first();

    if ($existingCartItem) {
        // If it exists, increase the quantity
        $existingCartItem->quantity += 1;
        $existingCartItem->save();
    } else {
        // If it does not exist, create a new cart item
        Cart_spare::create([
            'user_id' => auth()->id(),
            'sparepart_id' => $sparepart->id,
            'quantity' => 1,
        ]);
    }

    // Redirect back with a success message
    return redirect()->route('home')->with('success', 'Product added to cart successfully.');
}

public function search(Request $request)
{
    $query = $request->input('query');

    // Lakukan pencarian produk dan suku cadang
    $products = Product::where('name', 'like', "%$query%")->get();
    $spareparts = SparePart::where('name', 'like', "%$query%")->get();

    // Kirim hasil pencarian ke tampilan
    return view('search-results', compact('products', 'spareparts'));
}



   
}
    


