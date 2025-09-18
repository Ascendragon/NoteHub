<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateNoteTest extends TestCase
{

    public function creates_note_with_tags(): void
    {
        $payload = ['title' => 'Hello', 'content' => 'World', 'tags' => ['work', 'urgent']];
        $res = $this->postJson('/api/notes', $payload);

        $res->assertCreated()
            ->assertJsonPath('title', 'Hello');
    }
}
