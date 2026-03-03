<?php

namespace Tests\Unit\Services\User;

use App\Models\User;
use App\Services\User\UpdateUserService;
use App\Repositories\Contracts\IUserRepository;
use App\Http\RequestsValidations\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;
use Mockery;

class UpdateUserServiceTest extends TestCase
{
    public function test_it_updates_a_user_correctly()
    {
        $requestData = [
            'nickname' => 'updatednick',
            'username' => 'updateduser',
            'email' => 'updated@example.com',
            'password' => 'NovaSenha123!',
        ];

        $existingUser = new User([
            'id' => 1,
            'nickname' => 'oldnick',
            'username' => 'olduser',
            'email' => 'old@example.com',
            'password' => Hash::make('OldSenha123!'),
        ]);



        /** @var \App\Repositories\Contracts\IUserRepository|\Mockery\MockInterface $userRepository */

        $userRepository = Mockery::mock(IUserRepository::class);

        $userRepository->shouldReceive('updateUser')
            ->once()
            ->with(Mockery::type(User::class))
            ->andReturnUsing(fn($user) => $user);

        $service = new UpdateUserService($userRepository);
        
        $request = Mockery::mock(UpdateUserRequest::class);

        $request->shouldReceive('validated')->andReturn($requestData);
        $request->shouldReceive('filled')->andReturnUsing(fn($field) => isset($requestData[$field]));
        $request->shouldReceive('input')->andReturnUsing(fn($field) => $requestData[$field] ?? null);

        $updatedUser = $service->execute($existingUser, $request);

        $this->assertEquals('updatednick', $updatedUser->nickname);
        $this->assertEquals('updated@example.com', $updatedUser->email);
        $this->assertTrue(Hash::check('NovaSenha123!', $updatedUser->password));
    }

    public function test_validation_fails_with_invalid_data()
    {
        $invalidData = [
            'nickname' => '',
            'username' => '',
            'email' => 'invalid-email',
            'password' => '123',
        ];

        $rules = [
            'nickname' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'password' => 'sometimes|required|string|min:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[@$!%*?&]/'
        ];

        $validator = Validator::make($invalidData, $rules);

        $this->assertTrue($validator->fails());
    }

    public function test_each_field_is_required()
    {
        $baseData = [
            'nickname' => 'updatednick',
            'username' => 'updateduser',
            'email' => 'updated@example.com',
            'password' => 'NovaSenha123!@',
        ];

        $rules = [
            'nickname' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'password' => 'sometimes|required|string|min:12|regex:/[A-Z]/|regex:/[a-z]/|regex:/[@$!%*?&]/'
        ];

        foreach (array_keys($rules) as $field) {
            $data = $baseData;
            $data[$field] = '';

            $validator = Validator::make($data, $rules);

            $this->assertTrue($validator->fails(), "Validation should fail when '$field' is empty");
            $this->assertArrayHasKey($field, $validator->errors()->messages());
        }
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
