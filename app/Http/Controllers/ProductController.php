<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Sparepart;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   
        

    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'category' => 'required|string|in:car', 
        ]);
    
        $productData = [
            'name' => $request->name,
            'price' => $request->price,
        ];
    
        // Upload image using uploadImage function
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'));
            $productData['image'] = $imagePath;
        }
    
        // Simpan produk
        $product = new Product($productData);
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully.');
    }
    

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $product = Product::find($id);
    $product->name = $request->name;
    $product->price = $request->price;

    if ($request->hasFile('image')) {
        // Hapus gambar lama
        if ($product->image && file_exists(public_path('images/' . $product->image))) {
            unlink(public_path('images/' . $product->image));
        }
        
        // Simpan gambar baru
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    return redirect()->route('home')->with('success', 'Product updated successfully');
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

    //function untuk upload foto spareparts
    public function upload(Request $request)
{
    // Validasi file
    $request->validate([
        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Simpan file
    $imageName = time() . '.' . $request->product_image->extension();
    $request->product_image->move(public_path('images'), $imageName);

    // Simpan nama file ke database atau lakukan hal lain yang diperlukan

    return back()->with('success', 'Image uploaded successfully.')->with('image', $imageName);
}
public function destroy(Product $product)
{
    // Hapus gambar produk dari penyimpanan
    if ($product->image) {
        Storage::delete($product->image);
    }

    // Hapus produk dari database
    $product->delete();

    return redirect()->route('home')->with('success', 'Product deleted successfully.');
}

public function search(Request $request)
{
    $query = $request->input('query');
    
    // Lakukan pencarian produk berdasarkan nama
    $products = Product::where('name', 'like', "%$query%")->get();

    // Kirim hasil pencarian ke tampilan
    return view('search-results', compact('products'));
}



}
