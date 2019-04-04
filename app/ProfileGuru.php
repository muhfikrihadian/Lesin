<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileGuru extends Model
{
    protected $fillable = [
        'id', 'idguru', 'photo', 'lesco', 'ktp', 'norek', 'phone', 'alamat', 'tentang', 'created_at'
    ];
    public function profile(){
    	return $this->belongsTo('App\User','idguru','id');
    }
}
