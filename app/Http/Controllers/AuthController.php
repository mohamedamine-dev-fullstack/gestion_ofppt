<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponds;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponds;

    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error('Invalid credentials', 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ], 'Login successful');
    }
    
    // REGISTER
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:directeur du complexe,gestionnaire CFMR',
            'idPersonnel' => 'required|exists:personnels,id'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $token = $user->createToken('api-token')->plainTextToken;

        return $this->success([
            'user' => $user,
            'token' => $token
        ], 'User registered', 201);
    }

    // LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success(null, 'Logged out successfully');
    }
}