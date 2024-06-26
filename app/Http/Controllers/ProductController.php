<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Sparepart;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   
    public function index()
    {
        // Ambil data dari database, contoh:
        $products = Product::all(); 
        // Kirim data ke view
        return view('cars', compact('products'));
    }

        

    public function edit(Product $product)
    {
        return view('edit', compact('product'));
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'image' => 'required|image',
        'image2' => 'required|image',
        'image3' => 'required|image',
        'image4' => 'required|image',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'category' => 'required|string|in:car', 
    ]);

    $productData = [
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
    ];

    // Upload each image and add a unique suffix
    if ($request->hasFile('image')) {
        $productData['image'] = $this->uploadImage($request->file('image'), '_1');
    }
    if ($request->hasFile('image2')) {
        $productData['image2'] = $this->uploadImage($request->file('image2'), '_2');
    }
    if ($request->hasFile('image3')) {
        $productData['image3'] = $this->uploadImage($request->file('image3'), '_3');
    }
    if ($request->hasFile('image4')) {
        $productData['image4'] = $this->uploadImage($request->file('image4'), '_4');
    }

    // Save the product
    $product = new Product($productData);
    $product->save();

    return redirect()->back()->with('success', 'Product added successfully.');
}

    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);
    
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        
        $images = ['image', 'image2', 'image3', 'image4'];
        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                // Menghapus gambar lama jika ada
                if ($product->$image && file_exists(public_path('images/' . $product->$image))) {
                    unlink(public_path('images/' . $product->$image));
                }
                $file = $request->file($image);
                $name = time() . '_' . $image . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $file->move($destinationPath, $name);
                $product->$image = $name;
            }
        }
    
        $product->price = $request->input('price');
        $product->save();
    
        return redirect()->route('home')->with('success', 'Car updated successfully');
    }
    




    private function uploadImage($image, $suffix = '')
    {
        $imageName = time() . $suffix . '.' . $image->extension();
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
