<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return $user;
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable',
            'email' => 'required|email',
            'phone_number' => 'nullable|min:10',
            'address' => 'nullable',
            'user_image' => 'nullable|mimes:jpg,bmp,png',
        ]);

        Auth::user()->update($validated);

        return response([
            'status' => 201,
            'message' => 'User has been updated',
            'data' => Auth::user()
        ]);
    }
}
