<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	protected $table 	= 'feedbacks';

	protected $fillable = [

        'feedback_text','is_read',
        
    ];
}
