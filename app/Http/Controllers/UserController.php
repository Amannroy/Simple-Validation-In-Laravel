<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|max:8',
        ]);

        // Hash the password
       // $validatedData['password'] = Hash::make($validatedData['password']);

        // Create and store the user in the databse
        $user = User::create($validatedData);

        return redirect()->route('users.create')->with('success', 'User created successfully.');
    }

}

