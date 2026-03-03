<?php

namespace Tests\Unit\Services\User;

use App\Models\User;
use App\Services\User\CreateUserService;
use App\Repositories\Contracts\IUserRepository;
use App\Http\RequestsValidations\StoreUserRequest;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Mockery;

class CreateUserServiceTest extends TestCase
{
    public function test_it_creates_a_user_correctly()
    {
        $requestData = [
            'nickname' => 'testnick',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'Senha1233!Re',
        ];



        $userRepository = Mockery::mock(IUserRepository::class);

        $userRepository->shouldReceive('createUser')
            ->once()
            ->with(Mockery::on(fn($data) => $data['nickname'] === $requestData['nickname']))
            ->andReturn(new User(array_merge($requestData, [
                'password' => Hash::make($requestData['password'])
            ])));

        $service = new CreateUserService($userRepository);
        // Mock de StoreUserRequest apenas para retornar validated()

        $request = Mockery::mock(StoreUserRequest::class);
        $request->shouldReceive('validated')->andReturn($requestData);
        $request->shouldReceive('input')->andReturnUsing(fn($key) => $requestData[$key] ?? null);

        // Executa o serviço
        $user = $service->execute($request);

        // Assertions
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('testnick', $user->nickname);
        $this->assertEquals('testuser', $user->username);
        $this->assertEquals('test@example.com', $user->email);
        $this->assertTrue(Hash::check('Senha1233412!', $user->password));
    }

    public function test_validation_fails_with_invalid_data()
    {
        $invalidData = [
            'nickname' => '',
            'username' => '',
            'email' => 'invalid-email',
            'password' => '123',
        ];

        // Cria o validator usando as regras do StoreUserRequest
        $rules = (new StoreUserRequest())->rules();
        $validator = Validator::make($invalidData, $rules);

        $this->assertTrue($validator->fails());
    }

    public function test_validation_passes_with_valid_data()
    {
        $validData = [
            'nickname' => 'testnick',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'Senha1233!rt',
        ];

        /** @var \App\Http\RequestsValidations\StoreUserRequest $mock */

        // Pega as regras, mas ignora 'unique' para teste unitário

        $mock = Mockery::mock(StoreUserRequest::class)->makepartial()->shouldAllowMockingProtectedMethods();
        $rules = $mock->rules();
        unset($rules['username']);
        unset($rules['email']);

        $validator = Validator::make($validData, $rules);

        $this->assertFalse($validator->fails());

        $validated = $validator->validated();
        $this->assertEquals($validData['nickname'], $validated['nickname']);
        $this->assertEquals($validData['password'], $validated['password']);
    }

    public function test_each_field_is_required()
    {
        $baseData = [
            'nickname' => 'testnick',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => 'Senha1233!rt@',
        ];

        /** @var \App\Http\RequestsValidations\StoreUserRequest $mock */
        $mock = Mockery::mock(StoreUserRequest::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        // Pega as regras reais
        $rules = $mock->rules();

        // Ajusta as regras para teste unitário:
        // mantém 'required' mas remove 'unique' ou 'confirmed'
        if (isset($rules['username'])) {
            $rules['username'] = 'required|string|max:255';
        }
        if (isset($rules['email'])) {
            $rules['email'] = 'required|email';
        }
        if (isset($rules['password'][3])) {
            unset($rules['password'][3]); // remove 'confirmed'
        }

        // Campos obrigatórios que queremos testar
        $fields = ['nickname', 'username', 'email', 'password'];

        foreach ($fields as $field) {
            $data = $baseData;
            $data[$field] = ''; // simula campo vazio

            $validator = Validator::make($data, $rules);

            $this->assertTrue(
                $validator->fails(),
                "Validation should fail when '$field' is empty"
            );

            $this->assertArrayHasKey(
                $field,
                $validator->errors()->messages(),
                "Validation error for '$field' is missing"
            );
        }
    }





    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
