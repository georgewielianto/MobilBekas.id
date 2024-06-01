<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('home');
    }

    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $imageName = $this->uploadImage($request->file('image'));

        Product::create([
            'name' => $request->name,
            'image' => $imageName,
            'price' => $request->price,
        ]);

        return redirect()->route('home')->with('success', 'Product added successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete product image from storage
        if ($product->image) {
            Storage::delete('public/images/' . $product->image);
        }

        // Delete product
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::delete('images/' . $product->image);
            }
            // Upload gambar baru
            $imageName = $this->uploadImage($request->file('image'));
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('home')->with('success', 'Product updated successfully.');
    }

    private function uploadImage($image)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        return $imageName;
    }

    public function show(Product $product)
    {
        return view('show', compact('product'));
    }

    public function addToCart(Request $request, Product $product)
    {
        // Anda mungkin perlu menambahkan validasi di sini sesuai kebutuhan

        // Cek apakah produk sudah ada dalam keranjang
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if ($existingCartItem) {
            // Jika produk sudah ada, tambahkan jumlahnya
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            // Jika produk belum ada, buat item baru dalam keranjang
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        // Redirect atau kembalikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }
}
