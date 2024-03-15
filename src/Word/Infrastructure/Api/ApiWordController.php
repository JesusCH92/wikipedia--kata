<?php

declare(strict_types=1);

namespace App\Word\Infrastructure\Api;

use App\Common\Infrastructure\BaseController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ApiWordController extends BaseController
{
    public function __invoke(Request $request): Response
    {
        $input = $request->get('q', 'General Kenobi');

        return new JsonResponse(['message' => 'Hello There! ' . $input], Response::HTTP_OK);
    }
}
