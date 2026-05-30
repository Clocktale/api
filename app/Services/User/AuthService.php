<?php

namespace App\Services\User;

use App\Repositories\Contracts\IUserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private IUserRepository $userRepository) {}

    public function auth(array $data)
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException('Invalid credentials.');
        }

        $expiresAt = now()->addDays(15);

        $token = $user->createToken('token', ['*'], $expiresAt);

        $user->makeHidden(['roles']);

        return [
            'user' => $user,
            'role' => $user->hasRole('admin') ? 'admin' : 'user',
            'token' => $token->plainTextToken,
            'expire_at' => $expiresAt,
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
