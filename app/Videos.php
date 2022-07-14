<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable = [
        'id', 'guru', 'judul', 'deskripsi', 'video', 'lesco', 'sampul', 'created_at'
    ];
}
