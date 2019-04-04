<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoRoom extends Model
{
    protected $table = 'video';
	protected $fillable = [
    	'room_name', 'room_password',
    ];
}
