<?php

declare(strict_types=1);

namespace App\Word\Infrastructure\Controller;

use App\Common\Infrastructure\BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class WordController extends BaseController
{
    public function __invoke(Request $request): Response
    {
        return new Response($this->renderTemplate('/../../View/word/index.html'), Response::HTTP_OK);
    }
}
