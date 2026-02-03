<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    // Baris ini wajib ada agar Laravel mengizinkan penyimpanan data
    protected $fillable = ['user_id', 'content', 'status'];
}
