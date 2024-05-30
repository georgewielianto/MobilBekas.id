<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function create()
    {
        return view('home');
    }

    public function edit(Product $product){
        return view('edit', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
        ]);

        return redirect()->route('home')->with('success', 'Product added successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete  product
        $product->delete();

        
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }



public function update(Request $request, Product $product)
{
    // Lakukan validasi data yang dikirim dari form
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // tambahkan validasi untuk gambar
    ]);

    // Perbarui data produk
    $product->name = $request->name;
    $product->price = $request->price;

    // Periksa apakah ada file gambar yang dikirim
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            Storage::delete('public/images/' . $product->image);
        }

        // Upload gambar baru
        $imagePath = $request->file('image')->store('public/images');
        $product->image = basename($imagePath);
    }

    $product->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('home')->with('success', 'Product updated successfully.');
}

}
