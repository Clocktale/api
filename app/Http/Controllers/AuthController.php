<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\LoginRequest;
use App\Services\User\AuthService;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {

    }
    public function login(LoginRequest $request)
    {
        $data = $this->authService->auth($request->validated());

        return $this->success($data, 'Login successful.');
    }

    public function logout(Request $request){
        
        $this->authService->logout($request);

        return $this->success(null, 'Logout successful.', 200);
    }
}
