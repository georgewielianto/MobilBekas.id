<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Sparepart;


class HomeController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        $products = Product::all(); 
        $spareparts = Sparepart::all(); 
        
        return view('home', compact('user', 'products','spareparts'));
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


        return back()->with('success', 'Image uploaded successfully.')->with('image', $imageName);
    }
}