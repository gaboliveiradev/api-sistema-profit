<?php

namespace App\Http\Controllers;

use App\Domains\User\TypesUserDomain;
use App\Models\BusinessPartner;
use App\Models\GymModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller implements TypesUserDomain
{
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email|string|exists:users,email',
            'password' => 'required',
            'remember' => 'boolean',
        ]);

        $remember = $credential['remember'] ?? false;
        unset($credential['remember']);

        if (!Auth::attempt($credential, $remember)) {
            return response(['errors' => 'Usuário e/ou senha inválido(s)'], 422);
        }

        $user = Auth::user();

        if ($user->type !== self::TYPE_USER_DEVELOPER && $user->type !== self::TYPE_USER_ADMINISTRATOR) {
            return response(['errors' => 'Usuário e/ou senha inválido(s)'], 422);
        }

        if (!is_null($user->deleted_at)) {
            return response(['errors' => 'Usuário e/ou senha inválido(s)'], 422);
        }

        $token = $user->createToken(env('APP_NAME'), [$user->type])->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        
        return response(['success' => true]);
    }
}
