<?php

declare(strict_types=1);

namespace App\Word\Infrastructure\Persistence;

use App\Common\Infrastructure\DbConnector;
use App\Word\Domain\Entity\Word;
use App\Word\Domain\Repository\WordRepository;

final class PdoWordRepository extends DbConnector implements WordRepository
{
    public function save(Word $word): void
    {
        $pdo = $this->pdo();
        $stmt = $pdo->prepare('INSERT INTO word (uuid, text, created_at) VALUES (:uuid, :text, :created_at)');

        $stmt->bindValue('uuid', $word->uuid());
        $stmt->bindValue('text', $word->text()->value());
        $stmt->bindValue('created_at', $word->createdAt()->format('Y-m-d H:i:s'));

        $stmt->execute();
    }
}
