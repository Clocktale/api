<?php

namespace App\Services\User;

use App\Http\RequestsValidations\StoreUserRequest;
use App\Http\RequestsValidations\UpdateUserRequest;
use App\Models\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Support\Arr;

class UpdateUserService
{
    /**
     * Handle the creation of a new user.
     *
     * @param StoreUserRequest $request
     * @return User
     */

    /* Construtor da classe usando PHP 8 Constructor Property Promotion
    Isso declara automaticamente a propriedade $userRepository e a inicializa*/

    public function __construct(private IUserRepository $userRepository)
    {
    }

    public function execute(User $user, UpdateUserRequest $request): User
    {
        $data = Arr::only($request->validated(), ['nickname', 'email', 'password']);
        if ($request->filled('profile_picture'))
            $data['profile_picture'] = $request->input('profile_picture');
        if ($request->filled('password'))
            $data['password'] = Hash::make($request->input('password'));

        $user->fill($data);

        return $this->userRepository->updateUser($user);

    }

}