<?php

namespace App\Services\User;


use Illuminate\Support\Facades\Hash;
use App\Http\RequestsValidations\StoreUserRequest;
use App\Http\RequestsValidations\UpdateUserRequest;
use App\Models\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Str;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Support\Arr;

class UserService
{
    /* Construtor da classe usando PHP 8 Constructor Property Promotion
    Isso declara automaticamente a propriedade $userRepository e a inicializa*/

    public function __construct(private IUserRepository $userRepository)
    {
    }

    /**
     * Handle the creation of a new user.
     *
     * @param StoreUserRequest $request
     * @return User
     */
    public function create(StoreUserRequest $request): User
    {
        
        $data = Arr::only($request->validated(), ['nickname', 'username', 'email']);
        $data['password'] = Hash::make($request->input('password'));
        $data['role'] = 'user';
        $data['profile_picture'] = 'profile_picture/default.jpeg';

        $user = new User($data);

        return $this->userRepository->createUser($user);
    }

    /**
     * @param User $user
     * @param UpdateUserRequest $request
     * @return User
     */
    public function update(User $user, UpdateUserRequest $request): User
    {
        $data = Arr::only($request->validated(), ['nickname', 'email', 'password']);
        if ($request->filled('profile_picture'))
            $data['profile_picture'] = $request->input('profile_picture');
        if ($request->filled('password'))
            $data['password'] = Hash::make($request->input('password'));

        $user->fill($data);

        return $this->userRepository->updateUser($user);

    }

    public function delete(User $user): bool
    {
        return $this->userRepository->deleteUser($user);
    }
}
