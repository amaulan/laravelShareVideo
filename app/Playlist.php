<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
	public function courses()
    {
        return $this->belongsTo(Course::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
