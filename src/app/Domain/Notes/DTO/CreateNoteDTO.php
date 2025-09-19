<?php

namespace App\Domain\Notes\DTO;

final class CreateNoteDTO
{
    public function __construct(
        public int $userId,
        public string $title,
        public ?string $content = null,
        public array $tags = []
    )
    {

    }
}
