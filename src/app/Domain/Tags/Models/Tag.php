<?php

namespace app\Domain\Tags\Models;

use app\Domain\Notes\Models\Note;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'note_tag');
    }
}
