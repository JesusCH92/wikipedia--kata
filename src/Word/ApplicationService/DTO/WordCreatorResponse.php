<?php

declare(strict_types=1);

namespace App\Word\ApplicationService\DTO;

use DateTimeImmutable;

readonly class WordCreatorResponse
{
    public function __construct(
        public string $uuid,
        public string $text,
        public DateTimeImmutable $createdAt
    ) {
    }
}
