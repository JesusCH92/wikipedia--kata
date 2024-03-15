<?php

declare(strict_types=1);

namespace App\Wiki\ApplicationService\DTO;

readonly class TextSearcherResponse
{
    public function __construct(public ?string $tittle, public ?string $snippet)
    {
    }
}
