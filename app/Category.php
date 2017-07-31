<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public $timestamps = false;

	protected $fillable = [

	   'is_enable',

   	];

   	public function courses()
    {
        return $this->belongstoMany(Course::class,'course_categories','category_id','course_id');
    }


   public function courses()
    {
        return $this->belongstoMany(Course::class);
    }

}
