<?php

declare(strict_types=1);

namespace App\Word\ApplicationService\DTO;

readonly class WordCreatorRequest
{
    public function __construct(public ?string $text)
    {
    }
}
