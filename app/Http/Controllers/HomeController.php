<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $products = Product::all(); 
        
        return view('home', compact('user', 'products'));
    }

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
}