<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\StoreUserRequest;
use App\Http\RequestsValidations\UpdateUserRequest;
use App\Services\User\CreateUserService;
use App\Services\User\UpdateUserService;
use App\Services\User\DeleteUserService;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(
        private CreateUserService $createUserService,
        private UpdateUserService $updateUserService,
        private IUserRepository $userRepository
    ) {
    }


    public function store(StoreUserRequest $request)
    {
        $user = $this->createUserService->execute($request);
        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }


    public function update(User $user, UpdateUserRequest $request)
    {
        $this->updateUserService->execute($user, $request);
    }

    public function destroy(User $user, DeleteUserService $deleteUserService)
    {
        $deleted = $deleteUserService->execute($user);
        if ($deleted)
            return response()->json(['message' => 'User deleted successfully'], 200);
        else
            return response()->json(['message' => 'User not found'], 404);

    }

}
