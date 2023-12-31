<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $registers = Register::with('course', 'city')->get();
        return view('registers.index', compact('registers'));
    }

    public function destroy(Register $register)
    {
        $register->delete();
        return redirect()->route('registers.index')->with('success', 'Register deleted successfully!');
    }
}
