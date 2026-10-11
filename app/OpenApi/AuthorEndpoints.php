<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/authors',
    summary: 'Lista autores',
    tags: ['Authors'],
    parameters: [
        new OA\Parameter(name: 'name', in: 'query', required: false, schema: new OA\Schema(type: 'string', maxLength: 255)),
        new OA\Parameter(name: 'page', in: 'query', required: false, schema: new OA\Schema(type: 'integer', minimum: 1)),
        new OA\Parameter(name: 'perPage', in: 'query', required: false, schema: new OA\Schema(type: 'integer', minimum: 1, maximum: 100)),
    ],
    responses: [
        new OA\Response(response: 200, description: 'Autores listados', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Post(
    path: '/admin/authors',
    summary: 'Cria um autor',
    description: 'Exige token e papel admin.',
    security: [['bearerAuth' => []]],
    tags: ['Authors'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name'],
            properties: [
                new OA\Property(property: 'name', type: 'string', maxLength: 255),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: 'Autor criado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Put(
    path: '/admin/authors/{author}',
    summary: 'Atualiza um autor',
    description: 'Exige token e papel admin.',
    security: [['bearerAuth' => []]],
    tags: ['Authors'],
    parameters: [
        new OA\Parameter(name: 'author', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name'],
            properties: [
                new OA\Property(property: 'name', type: 'string', maxLength: 255),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Autor atualizado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Delete(
    path: '/admin/authors/{author}',
    summary: 'Remove um autor',
    description: 'Exige token e papel admin.',
    security: [['bearerAuth' => []]],
    tags: ['Authors'],
    parameters: [
        new OA\Parameter(name: 'author', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
    ],
    responses: [
        new OA\Response(response: 200, description: 'Autor removido', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 404, description: 'Autor não encontrado', content: new OA\JsonContent(ref: '#/components/schemas/ErrorResponse')),
    ]
)]
class AuthorEndpoints
{
}
