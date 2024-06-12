<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Models\Cart_spare; 
use App\Models\Product;

class SparePartController extends Controller
{
    public function index()
    {
        // Ambil data dari database, contoh:
        $spareparts = SparePart::all(); 
        // Kirim data ke view
        return view('spareparts', compact('spareparts'));
    }

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
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        ]);
    
        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }
    
        SparePart::create([
            'name' => $request->name,
            'description' => $request->description, // Save the description
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
            'description' => 'nullable|string', // Ubah menjadi nullable
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
        ]);
    
        $sparepart->name = $request->name;
        $sparepart->description = $request->description; // Tetap update deskripsi, walaupun nullable
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
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to be logged in to add items to the cart.');
    }

    $existingCartItem = Cart_spare::where('user_id', auth()->id())
        ->where('sparepart_id', $sparepart->id)
        ->first();

    if ($existingCartItem) {
        $existingCartItem->quantity += 1;
        $existingCartItem->save();
    } else {
        Cart_spare::create([
            'user_id' => auth()->id(),
            'sparepart_id' => $sparepart->id,
            'quantity' => 1,
        ]);
    }

    return redirect()->route('home')->with('success', 'Product added to cart successfully.');
}

public function search(Request $request)
{
    $query = strtolower($request->input('query'));

    // Lakukan pencarian produk dan suku cadang tanpa memandang huruf besar dan kecil
    $products = Product::whereRaw('LOWER(name) LIKE ?', ["%$query%"])->get();
    $spareparts = SparePart::whereRaw('LOWER(name) LIKE ?', ["%$query%"])->get();

    // Kirim hasil pencarian ke tampilan
    return view('search-results', compact('products', 'spareparts'));
}




   
}
    


