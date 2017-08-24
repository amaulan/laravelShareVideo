<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
	public $timestamps 		= false;

    protected $fillable 	= [

	 'playlist_name',
     'ip',

   	];
}
