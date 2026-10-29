<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['date', 
	'name', 
	'description', 
	'status', ];

}
