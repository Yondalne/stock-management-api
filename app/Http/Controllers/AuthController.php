<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        try {
            $validatedData = $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:6',
                'contact' => 'required|string|max:255',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'contact' => $validatedData['contact'],
            ]);

            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json(['user' => $user, 'token' => $token], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    /**
     * Authenticate user and return access token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $validatedData = $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if (!Auth::attempt($validatedData)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json(['user' => $user, 'token' => $token], 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 400);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully Logged out'], 200);
    }
}
