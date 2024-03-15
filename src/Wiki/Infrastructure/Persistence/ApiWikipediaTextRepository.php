<?php

declare(strict_types=1);

namespace App\Wiki\Infrastructure\Persistence;

use App\Common\Domain\Constant\Wikipedia;
use App\Common\Infrastructure\Library\Client;
use App\Wiki\Domain\Repository\TextRepository;

final class ApiWikipediaTextRepository extends Client implements TextRepository
{
    public function searchText(?string $text): array
    {
        $queryParams = sprintf('?action=query&list=search&srsearch=%s&format=json', $text);
        $url = Wikipedia::API_DOMAIN . $queryParams;

        return $this->get($url);
    }

    protected function uri(): string
    {
        return Wikipedia::API_DOMAIN;
    }
}
