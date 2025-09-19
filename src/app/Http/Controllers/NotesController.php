<?php

namespace App\Http\Controllers;

use App\Application\Notes\NoteService;
use App\Domain\Notes\DTO\CreateNoteDTO;
use App\Http\Requests\StoreNoteRequest;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function __construct(
        private NoteService $service
    ) {}

    public function store(StoreNoteRequest $request)
    {
        $userId = auth()->id() ?? 1; // Временно пока нет авторизации

        $dto = new CreateNoteDTO(
            userId: $userId,
            title: $request->string('title')->toString(),
            content: $request->input('content'),
            tags: $request->input('tags', [])
        );
        $note = $this->service->create($dto);
        return response()->json([
            'id'=>$note->id,'title'=>$note->title,'tags'=>$note->tags()->pluck('name'),
        ], 201);
    }
}
