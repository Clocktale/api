<?php

namespace App\Services\User;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Repositories\Contracts\IUserRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;




class AuthService
{

    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function auth(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException('Invalid credentials.');
        }

        $expiresAt = now()->addDays(15);

        $token = $user->createToken('token', ['*'], $expiresAt);

        return [
            'user' => $user,
            'token' => $token->plainTextToken,
            'expire_at' => $expiresAt
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
