<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable  = [

        'course_name',
        'course_desc',
        'course_picture',
        'permission',
        'is_publish',
        'can_comment',
        'complete',
        'published_at',
        'playlist_add',
        'user_id',
        'level_id'
    
    ];

    public function levels()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class, 'course_id');
    }
    
    public function categories()
    {
        return $this->belongstoMany(Category::class,'course_categories','course_id','category_id');
    }
}
