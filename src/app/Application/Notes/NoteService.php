<?php

namespace App\Application\Notes;

use App\Domain\Notes\DTO\CreateNoteDTO;
use app\Domain\Notes\Models\Note;
use app\Domain\Tags\Models\Tag;
use Illuminate\Support\Facades\DB;

final class NoteService
{
    public function create(CreateNoteDTO $dto)
    {
        return DB::transaction(function () use ($dto) {
            $note = Note::create([
                'user_id' => $dto->userId,
                'title' => $dto->title,
                'content' => $dto->content,
            ]);

            if($dto->tags) {
                $tagIds = collect($dto->tags)->map(
                    fn($n) => Tag::firstOrCreate([
                        'name' => strtolower(trim($n))])->id)->all();
                $note->tags->sync($tagIds);
            }
        return $note;
            });
    }
}
