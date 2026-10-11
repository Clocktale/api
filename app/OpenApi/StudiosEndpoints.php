<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/admin/studios',
    summary: 'Cria um estúdio de anime',
    description: 'Exige token e papel admin. Nome único, até 50 caracteres. Logo é opcional.',
    security: [['bearerAuth' => []]],
    tags: ['Studios'],
    responses: [
        new OA\Response(response: 201, description: 'Estúdio criado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]
#[OA\Put(
    path: '/admin/studios/{studio}',
    summary: 'Atualiza um estúdio de anime',
    description: 'Exige token e papel admin. Nome único, até 50 caracteres. Logo é opcional.',
    security: [['bearerAuth' => []]],
    tags: ['Studios'],

    responses: [
        new OA\Response(response: 200, description: 'Estúdio atualizado', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 422, description: 'Validação', content: new OA\JsonContent(ref: '#/components/schemas/ValidationError')),
    ]
)]

#[OA\Get(
    path: '/studios/{studio}',
    summary: 'Mostra um estúdio de anime',
    description: 'Mostra um estúdio de anime.',
    security: [['bearerAuth' => []]],
    tags: ['Studios'],
    responses: [
        new OA\Response(response: 200, description: 'Lista de estúdios', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 404, description: 'Estúdio não encontrado'),
    ]
)]

#[OA\Delete(
    path: '/admin/studios/{studio}',
    summary: 'Remove um estúdio de anime',
    description: 'Exige token e papel admin. Remove um estúdio de anime.',
    security: [['bearerAuth' => []]],
    tags: ['Studios'],
    responses: [
        new OA\Response(response: 200, description: 'Estúdio removido', content: new OA\JsonContent(ref: '#/components/schemas/SuccessResponse')),
        new OA\Response(response: 401, description: 'Não autenticado'),
        new OA\Response(response: 403, description: 'Sem papel admin'),
        new OA\Response(response: 404, description: 'Estúdio não encontrado'),
    ]
)]
class StudiosEndpoints
{
}