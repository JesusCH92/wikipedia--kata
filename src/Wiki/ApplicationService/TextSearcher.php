<?php

declare(strict_types=1);

namespace App\Wiki\ApplicationService;

use App\Wiki\ApplicationService\DTO\TextSearcherResponse;
use App\Wiki\Domain\Repository\TextRepository;

final class TextSearcher
{
    public function __construct(private readonly TextRepository $textRepository)
    {
    }

    public function __invoke(string $text): TextSearcherResponse
    {
        $wikiResponse =  $this->textRepository->searchText($text);

        $title = $wikiResponse['query']['search'][0]['title'] ?? null;
        $snippet = $wikiResponse['query']['search'][0]['snippet'] ?? null;

        return new TextSearcherResponse($title, $snippet);
    }
}
