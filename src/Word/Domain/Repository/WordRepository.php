<?php

declare(strict_types=1);

namespace App\Word\Domain\Repository;

use App\Word\Domain\Entity\Word;

interface WordRepository
{
    public function save(Word $word): void;
}
