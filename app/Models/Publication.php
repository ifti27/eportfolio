<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'title', 'authors', 'journal', 'year',
        'abstract', 'doi_url', 'pdf_url', 'sort_order',
    ];
}
