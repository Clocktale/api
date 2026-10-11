<?php

namespace App\Services\User;


use Illuminate\Support\Facades\Hash;
use App\Http\RequestsValidations\UserRequest;
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
     * @param UserRequest $request
     * @return User
     */
    public function create(UserRequest $request): User
    {
        
        $data = Arr::only($request->validated(), ['nickname', 'username', 'email']);
        $data['password'] = Hash::make($request->input('password'));
        $data['role'] = 'user';

        $user = new User($data);

        return $this->userRepository->createUser($user);
    }

    /**
     * @param User $user
     * @param UserRequest $request
     * @return User
     */
    public function update(User $user, UserRequest $request): User
    {
        $data = Arr::only($request->validated(), ['nickname', 'email', 'password']);
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
