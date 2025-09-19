<?php

namespace app\Domain\Notes\Models;

use App\Domain\Comments\Models\Comment;
use app\Domain\Tags\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'content',
        'is_pinned',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'note_tag');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
