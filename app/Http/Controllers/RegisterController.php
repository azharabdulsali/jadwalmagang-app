<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect('/login')->with('success', 'User successfully registered!');
    }
}
