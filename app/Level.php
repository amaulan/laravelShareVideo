<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

	public $timestamps = false;

	protected $fillable = [

   'id','level_name',

   	];

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }
}
