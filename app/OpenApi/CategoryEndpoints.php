<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/admin/categories',
    summary: 'Cria uma categoria de anime',
    description: 'Exige token e papel admin. Nome único, até 50 caracteres. Descrição obrigatória, até 500 caracteres.',
    security: [['bearerAuth' => []]],
    tags: ['Categories'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ['name', 'description'],
            properties: [
                new OA\Property(property: 'name', type: 'string', maxLength: 50, example: 'Shōnen'),
                new OA\Property(property: 'description', type: 'string', maxLength: 500),
            ]
        )
    ),
    responses: [
        new OA\Response(response: 201, description: 'Categoria criada', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado ou sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]

#[OA\Delete(
    path: '/admin/categories/{category}',
    summary: 'Remove uma categoria de anime',
    description: 'Exige token e papel admin. Remove uma categoria de anime.',
    security: [['bearerAuth' => []]],
    tags: ['Categories'],
    responses: [
        new OA\Response(response: 200, description: 'Categoria removida', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado ou sem papel admin'),
        new OA\Response(response: 404, description: 'Categoria não encontrada'),
    ]
)]

class CategoryEndpoints
{
}
