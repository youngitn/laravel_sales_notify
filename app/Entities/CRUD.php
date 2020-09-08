<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CRUD extends Model
{
    protected $table = 'c_r_u_ds';
    protected $fillable = [
        'title', 'content',
    ];
}
