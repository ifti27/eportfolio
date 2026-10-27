<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = [
        'degree',
        'institution',
        'level',
        'result',
        'duration',
        'field_of_study',
        'description',
        'sort_order',
    ];
}
