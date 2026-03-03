<?php

namespace App\Services\User;


use Illuminate\Support\Facades\Hash;
use App\Http\RequestsValidations\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Str;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Support\Arr;

class CreateUserService
{
    /**
     * Handle the creation of a new user.
     *
     * @param StoreUserRequest $request
     * @return User
     */

    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function execute(StoreUserRequest $request): User
    {
        
        $data = Arr::only($request->validated(), ['nickname', 'username', 'email']);
        $data['password'] = Hash::make($request->input('password'));
        $data['role'] = 'user';
        $data['profile_picture'] = 'profile_picture/default.jpeg';

        $user = new User($data);

        return $this->userRepository->createUser($user);
    }

}