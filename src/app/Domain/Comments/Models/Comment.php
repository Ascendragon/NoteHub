<?php

namespace App\Domain\Comments\Models;

use app\Domain\Notes\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'note_id',
        'user_id',
        'content'
    ];

    public function note()
    {
        return $this->belongsTo(Note::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
