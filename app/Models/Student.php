<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $tab = 'students';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address'
    ];
}
