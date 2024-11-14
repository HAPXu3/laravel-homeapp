<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller implements HasMiddleware
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nickname' => 'required|string|max:16',
            'password' => 'required|string|min:6',
        ]);

        $newUser = User::query()->create([
            'name' => $validated['nickname'],
            'password' => Hash::make($validated['password']),
        ]);

        auth()->login($newUser);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $user = User::query()->where('name', '=', $request->input('nickname'))->first();

        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect('/login');
        }

        auth()->login($user);

        return redirect('/');
    }

    public static function middleware(): array
    {
        return [
            new Middleware('guest')
        ];
    }
}
