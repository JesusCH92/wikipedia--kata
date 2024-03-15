<?php

declare(strict_types=1);

namespace App\Word\Domain\ValueObject;

use App\Common\Domain\ValueObject\StringValueObject;
use Exception;

final class Text extends StringValueObject
{
    const LENGTH_MAX = 200;

    protected function saveIfIsAllowed(?string $value): void
    {
        if (in_array($value, ['', null], true)) {
            throw new Exception('Name is required');
        }

        if (strlen($value) > self::LENGTH_MAX) {
            throw new Exception(sprintf('%s is greater than %s characters', $value, self::LENGTH_MAX));
        }
    }
}
