<?php

declare(strict_types=1);

namespace App\Word\Infrastructure\Api;

use App\Common\Infrastructure\BaseController;
use App\Wiki\ApplicationService\TextSearcher;
use App\Wiki\Infrastructure\Persistence\ApiWikipediaTextRepository;
use App\Word\ApplicationService\DTO\WordCreatorRequest;
use App\Word\ApplicationService\WordCreator;
use App\Word\Infrastructure\Persistence\PdoWordRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ApiWordController extends BaseController
{
    public function __invoke(Request $request): Response
    {
        $input = $request->get('q');

        if (in_array($input, [null, ''], true)) {
            return $this->successApi([
                'input' => null,
                'title' => null,
                'snippet' => null,
            ]);
        }

        try {
            $wordResponse = $this->wordCreator()(new WordCreatorRequest($input));
            $textResponse = $this->textSearcher()($wordResponse->text);
        } catch (\Exception $e) {
            return $this->errorApI($e->getMessage());
        }

        return $this->successApi([
            'input' => $wordResponse->text,
            'title' => $textResponse->tittle,
            'snippet' => $textResponse->snippet,
        ]);
    }

    private function wordCreator(): WordCreator
    {
        return new WordCreator(new PdoWordRepository());
    }

    private function textSearcher(): TextSearcher
    {
        return new TextSearcher(new ApiWikipediaTextRepository());
    }
}
