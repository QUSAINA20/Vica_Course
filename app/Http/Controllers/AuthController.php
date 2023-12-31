<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('categories.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show the form to change the user's name and email
    public function showChangeInfoForm()
    {
        return view('auth.settings.info');
    }

    // Update the user's name and email
    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        auth()->user()->update([
            'name' => $request->input('name'),
            'user_name' => $request->input('user_name'),
            'email' => $request->input('email'),
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/user_images');
            auth()->user()->update(['image' => $imagePath]);
        }

        return redirect()->back()->with('success', 'Info updated successfully.');
    }

    // Show the form to change the user's password
    public function showChangePasswordForm()
    {
        return view('auth.settings.password');
    }

    // Update the user's password
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
