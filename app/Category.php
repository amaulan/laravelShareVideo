<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


   public function courses()
    {
        return $this->belongstoMany(Course::class);
    }

	public $timestamps = false;

	protected $fillable = [

   'is_enable',

   ];

}
