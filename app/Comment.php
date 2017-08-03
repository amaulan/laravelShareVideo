<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = [
    'id', 'comment_text', 'deleted_at','is_blocked','created_at','updated_at','user_id','playlist_id',
    ];

    public function playlists()
    {
        return $this->belongsTo(Playlist::class,'playlist_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
