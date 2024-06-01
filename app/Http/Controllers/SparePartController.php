<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;
use App\Models\Cart; 

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

    public function addToCart(Request $request, SparePart $sparepart)
    {
        // Anda mungkin perlu menambahkan validasi di sini sesuai kebutuhan

        // Cek apakah produk sudah ada dalam keranjang
        $existingCartItem = Cart::where('user_id', auth()->id())
            ->where('sparepart_id', $sparepart->id)
            ->first();

        if ($existingCartItem) {
            // Jika produk sudah ada, tambahkan jumlahnya
            $existingCartItem->quantity += 1;
            $existingCartItem->save();
        } else {
            // Jika produk belum ada, buat item baru dalam keranjang
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $sparepart->id,
                'quantity' => 1,
            ]);
        }

        // Redirect atau kembalikan respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

   

   
}
    


