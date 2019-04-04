<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileMurid extends Model
{
    protected $fillable = [
        'id', 'idmurid', 'photo', 'lesco', 'sekolah', 'jenjang', 'nisn', 'norek', 'phone', 'alamat', 'tentang', 'created_at'
    ];
    public function profile(){
    	return $this->belongsTo('App\User','idmurid','id');
    }
}
