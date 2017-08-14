<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public $timestamps   = false;

	protected $fillable  = [

	   'category_name',
     'category_color',
     'is_enable',

   	];

  public function courses()
  {
    return $this->belongstoMany(Course::class,'course_categories','category_id','course_id');
  }
}
