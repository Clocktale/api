<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/admin/animes',
    summary: 'Cria um anime',
    description: 'Exige token e papel admin. Envio multipart por causa das imagens.',
    security: [['bearerAuth' => []]],
    tags: ['Animes'],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: 'multipart/form-data',
            schema: new OA\Schema(
                required: ['title', 'description', 'release_date', 'content_lenght', 'author_id', 'studio_id', 'cover_image', 'banner_image', 'status', 'story_lenght'],
                properties: [
                    new OA\Property(property: 'title', type: 'string', maxLength: 255),
                    new OA\Property(property: 'original_title', type: 'string', maxLength: 255, nullable: true),
                    new OA\Property(property: 'description', type: 'string', maxLength: 255),
                    new OA\Property(property: 'release_date', type: 'string', format: 'date'),
                    new OA\Property(property: 'content_lenght', type: 'integer'),
                    new OA\Property(property: 'author_id', type: 'integer'),
                    new OA\Property(property: 'studio_id', type: 'integer'),
                    new OA\Property(property: 'cover_image', type: 'string', format: 'binary'),
                    new OA\Property(property: 'banner_image', type: 'string', format: 'binary'),
                    new OA\Property(property: 'status', type: 'string', maxLength: 255),
                    new OA\Property(property: 'story_lenght', type: 'string', maxLength: 255),
                ]
            )
        )
    ),
    responses: [
        new OA\Response(response: 201, description: 'Anime criado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Put(
    path: '/admin/animes/{anime}',
    summary: 'Atualiza um anime',
    description: 'Exige token e papel admin.',
    security: [['bearerAuth' => []]],
    tags: ['Animes'],
    parameters: [
        new OA\Parameter(name: 'anime', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
    ],
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: 'multipart/form-data',
            schema: new OA\Schema(
                required: ['title', 'description', 'release_date', 'content_lenght', 'author_id', 'studio_id', 'cover_image', 'banner_image', 'status', 'story_lenght'],
                properties: [
                    new OA\Property(property: 'title', type: 'string', maxLength: 255),
                    new OA\Property(property: 'original_title', type: 'string', maxLength: 255, nullable: true),
                    new OA\Property(property: 'description', type: 'string', maxLength: 255),
                    new OA\Property(property: 'release_date', type: 'string', format: 'date'),
                    new OA\Property(property: 'content_lenght', type: 'integer'),
                    new OA\Property(property: 'author_id', type: 'integer'),
                    new OA\Property(property: 'studio_id', type: 'integer'),
                    new OA\Property(property: 'cover_image', type: 'string', format: 'binary'),
                    new OA\Property(property: 'banner_image', type: 'string', format: 'binary'),
                    new OA\Property(property: 'status', type: 'string', maxLength: 255),
                    new OA\Property(property: 'story_lenght', type: 'string', maxLength: 255),
                ]
            )
        )
    ),
    responses: [
        new OA\Response(response: 200, description: 'Anime atualizado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Delete(
    path: '/admin/animes/{anime}',
    summary: 'Remove um anime',
    description: 'Exige token e papel admin.',
    security: [['bearerAuth' => []]],
    tags: ['Animes'],
    parameters: [
        new OA\Parameter(name: 'anime', in: 'path', required: true, schema: new OA\Schema(type: 'integer')),
    ],
    responses: [
        new OA\Response(response: 200, description: 'Anime removido', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
    ]
)]
class AnimeEndpoints
{
}
