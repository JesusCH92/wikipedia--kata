<?php

declare(strict_types=1);

namespace App\Common\Infrastructure;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BaseController
{
    public function __construct(protected array $dc)
    {
    }

    protected function renderTemplate(string $pathView): string
    {
        $pathToHtml = __DIR__ . $pathView;

        $htmlContent = file_get_contents($pathToHtml);

        if (false === $htmlContent) {
            throw new \Exception('Error reading file');
        }

        return $htmlContent;
    }

    protected function successApi(array $data): JsonResponse
    {
        return new JsonResponse(
            [
                'ok' => true,
                'data' => $data,
            ],
            Response::HTTP_OK
        );
    }

    protected function errorApI(?string $message): JsonResponse
    {
        return new JsonResponse(
            [
                'ok' => false,
                'error' => ['message' => $message,]
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
