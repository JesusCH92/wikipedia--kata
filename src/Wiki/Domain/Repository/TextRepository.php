<?php

declare(strict_types=1);

namespace App\Wiki\Domain\Repository;

interface TextRepository
{
    public function searchText(?string $text): array;
}
