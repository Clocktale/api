<?php

namespace App\Http\Controllers;

use App\Http\RequestsValidations\StoreUserRequest;
use App\Http\RequestsValidations\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Contracts\IUserRepository;
use App\Services\User\UserService;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService,
        private IUserRepository $userRepository
    ) {}

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->create($request);

        return $this->success($user, 'User created successfully.', 201);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $this->authorize('update', $user);
        $updated = $this->userService->update($user, $request);

        return $this->success($updated, 'User updated successfully.', 200);
    }

    public function destroy(User $user)
    {
        $deleted = $this->userService->delete($user);

        if ($deleted) {
            return $this->success(null, 'User deleted successfully.', 200);
        }

        return $this->error('User not found.', 404);
    }
}
