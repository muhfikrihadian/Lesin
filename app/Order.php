<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public $table = "order";

    protected $fillable = [
        'id', 'studentname', 'teachername', 'pelajaran', 'deskripsi', 'durasi', 'lesco', 'alamat', 'status', 'jenjang', 'type', 'created_at'
    ];
}
