<?php

declare(strict_types=1);

namespace App\Common\Infrastructure;

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
}
