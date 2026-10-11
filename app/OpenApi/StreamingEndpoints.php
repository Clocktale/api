<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/streamings',
    summary: 'Lista streamings',
    tags: ['Streamings'],
    parameters: [
        new OA\Parameter(name: 'name', in: 'query', required: false, schema: new OA\Schema(type: 'string', maxLength: 255)),
        new OA\Parameter(name: 'page', in: 'query', required: false, schema: new OA\Schema(type: 'integer', minimum: 1)),
        new OA\Parameter(name: 'perPage', in: 'query', required: false, schema: new OA\Schema(type: 'integer', minimum: 1, maximum: 100)),
    ],
    responses: [
        new OA\Response(response: 200, description: 'Streamings listados', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Post(
    path: '/admin/streamings',
    summary: 'Cria um streaming',
    description: 'Exige token e papel admin. Envio multipart por causa do logo.',
    security: [['bearerAuth' => []]],
    tags: ['Streamings'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: 'multipart/form-data',
            schema: new OA\Schema(
                required: ['name', 'url', 'logo'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', maxLength: 255),
                    new OA\Property(property: 'url', type: 'string', maxLength: 255),
                    new OA\Property(property: 'logo', type: 'string', format: 'binary'),
                ]
            )
        )
    ),
    responses: [
        new OA\Response(response: 201, description: 'Streaming criado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Put(
    path: '/admin/streamings/{streaming}',
    summary: 'Atualiza um streaming',
    description: 'Exige token e papel admin. Logo é opcional.',
    security: [['bearerAuth' => []]],
    tags: ['Streamings'],
    parameters: [
        new OA\Parameter(name: 'streaming', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: 'multipart/form-data',
            schema: new OA\Schema(
                required: ['name', 'url'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', maxLength: 255),
                    new OA\Property(property: 'url', type: 'string', maxLength: 255),
                    new OA\Property(property: 'logo', type: 'string', format: 'binary', nullable: true),
                ]
            )
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Streaming atualizado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Delete(
    path: '/admin/streamings/{streaming}',
    summary: 'Remove um streaming',
    description: 'Exige token e papel admin.',
    security: [['bearerAuth' => []]],
    tags: ['Streamings'],
    parameters: [
        new OA\Parameter(name: 'streaming', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
    ],
    responses: [
        new OA\Response(response: 200, description: 'Streaming removido', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
    ]
)]
class StreamingEndpoints
{
}
