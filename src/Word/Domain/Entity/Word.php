<?php

declare(strict_types=1);

namespace App\Word\Domain\Entity;

use App\Word\Domain\ValueObject\Text;
use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

final class Word
{
    private string $uuid;
    private Text $text;
    private DateTimeImmutable $createdAt;

    public function __construct(?string $input)
    {
        $this->uuid = Uuid::uuid4()->toString();
        $this->text = new Text($input);
        $this->createdAt = new DateTimeImmutable();
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function text(): Text
    {
        return $this->text;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
