<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateNoteTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_note_with_tags(): void
    {
        $user = User::factory()->create();
        $payload = ['title' => 'Hello', 'content' => 'World', 'tags' => ['work', 'urgent'], 'user_id' => $user->id];
        $res = $this->postJson('/api/notes', $payload);

        $res->assertCreated()
            ->assertJsonPath('title', 'Hello');
    }
}
