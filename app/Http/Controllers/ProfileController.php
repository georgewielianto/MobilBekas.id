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
        // Return the view for the user profile
        return view('profile');
    }

    public function update(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('profile')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the input name is already taken
        $existingUser = User::where('name', $request->input('name'))->where('id', '!=', $user->id)->first();
    
        if ($existingUser) {
            return redirect()->route('profile')->withInput()->withErrors(['name' => 'The username has already been taken. Please pick another username.']);
        }
    
        // Update the user's profile
        $user->name = $request->input('name');
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
    
        $user->save();
    
        // Redirect back with a success message
        return redirect()->route('profile')->with('status', 'Profile updated successfully.');
    }

    public function destroy()
    {
        // Check if user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
    
            // Delete the user
            $user->delete();
    
            // Logout the user
            Auth::logout();
    
            // Redirect to the homepage or any other page
            return redirect()->route('login')->with('status', 'Your account has been deleted.');
        }
    }
}
