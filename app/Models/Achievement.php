<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'category',
        'issuer',
        'year',
        'description',
        'link',
        'icon',
        'sort_order',
    ];
}
