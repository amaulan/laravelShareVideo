<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function playlists()
    {
        return $this->belongsTo(Playlist::class);
    }public function users()
    {
        return $this->belongsTo(User::class);
    }
}
