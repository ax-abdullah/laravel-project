<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
// use Illuminate\Foundation\Auth\RefreshDatabase;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // return $user->createToken($request->device_name)->plainTextToken;
        return response()->json(['user' => $user, 'token'=> $user->createToken($request->device_name)->plainTextToken]);
    }

    public function user(Request $request)
    {
        return $request->user();
    }
    // use RefreshDatabase;
    // ===================================================
    public function register(Request $request)
    {
        request()->validate([
            'username' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'device_name' => ['required']
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->save();

        return response()->json(['user' => $user, 'token'=> $user->createToken($request->device_name)->plainTextToken]);
    }
    // ==================================================================
    public function logout()
    {
        return request()->user()->currentAccessToken()->delete();
    }
}
