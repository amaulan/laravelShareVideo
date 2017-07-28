<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function classes()
    {
        return $this->belongsTo(Class::class);
    }public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
    public function categories()
    {
        return $this->belongstoMany(Category::class);
    }
}
