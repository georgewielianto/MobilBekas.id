<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User; 

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('profile')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        $user = Auth::user();
    
        $existingUser = User::where('name', $request->input('name'))->where('id', '!=', $user->id)->first();
    
        if ($existingUser) {
            return redirect()->route('profile')->withInput()->withErrors(['name' => 'The username has already been taken. Please pick another username.']);
        }
    
        $user->name = $request->input('name');
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
    
        return redirect()->route('profile')->with('status', 'Profile updated successfully.');
    }

    public function destroy()
    {
        if (Auth::check()) {
            $user = Auth::user();
    
            $user->delete();
    
            Auth::logout();
    
            return redirect()->route('login')->with('status', 'Your account has been deleted.');
        }
    }
}
