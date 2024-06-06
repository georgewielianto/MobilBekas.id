<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;

class AdminController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('user')->get();
        return view('admin', ['checkouts' => $checkouts]);
    }

    public function destroy($id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->delete();

        return redirect()->route('admin')->with('success', 'Checkout detail deleted successfully.');
    }
}


