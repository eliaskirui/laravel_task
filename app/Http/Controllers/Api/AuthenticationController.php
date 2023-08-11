<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signup(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:191'],
            'email'=> ['required', 'max:191', 'unique:users', 'email'],
            'password'=> ['required', 'min:6', 'confirmed'] ,
        ]);
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        return response()->json([
           'data' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $request->validate([
           'email' => ['required', 'max:191', 'email'],
           'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
               'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json([
            'data' => $user->createToken('login')->plainTextToken
        ]);

    }

    public function logout(Request $request)
    {
        return response()->json([
            'data' => $request->user()->currentAccessToken()->delete()
        ]);
    }
}
