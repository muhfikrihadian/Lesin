<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyVideos extends Model
{
    public $table = "myvideos";

    protected $fillable = [
        'id', 'iduser', 'guru', 'judul', 'deskripsi', 'video', 'lesco', 'sampul', 'created_at'
    ];

}
