<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

	public $timestamps = false;

    protected $fillable = [

   'level_name',

   ];
}
