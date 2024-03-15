<?php

declare(strict_types=1);

namespace App\Word\ApplicationService;

use App\Word\ApplicationService\DTO\WordCreatorRequest;
use App\Word\ApplicationService\DTO\WordCreatorResponse;
use App\Word\Domain\Entity\Word;
use App\Word\Domain\Repository\WordRepository;

final class WordCreator
{
    public function __construct(private readonly WordRepository $repository)
    {
    }

    public function __invoke(WordCreatorRequest $request): WordCreatorResponse
    {
        $word = new Word($request->text);

        $this->repository->save($word);

        return new WordCreatorResponse($word->uuid(), $word->text()->value(), $word->createdAt());
    }
}
