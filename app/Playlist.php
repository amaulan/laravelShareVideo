<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
	protected $fillable 		= 	[

		'playlists_name',
		'playlists_video',
		'playlist_video_url',
		'video_length',
		'can_comment',
		'course_id'
	
	];

	public function courses()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class,'playlist_id','id');
    }
}
