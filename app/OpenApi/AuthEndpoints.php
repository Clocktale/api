<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/auth/login',
    summary: 'Autentica um usuário',
    tags: ['Auth'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['email', 'password'],
            properties: [
                new OA\Property(property: 'email', type: 'string', format: 'email'),
                new OA\Property(property: 'password', type: 'string', minLength: 12),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Login realizado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Credenciais inválidas'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Post(
    path: '/auth/logout',
    summary: 'Revoga o token atual',
    security: [['bearerAuth' => []]],
    tags: ['Auth'],
    responses: [
        new OA\Response(response: 200, description: 'Logout realizado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
    ]
)]
class AuthEndpoints
{
}
