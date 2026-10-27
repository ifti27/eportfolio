<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'title', 'bio', 'co_curricular', 'avatar', 'resume_url',
        'github_url', 'linkedin_url', 'twitter_url',
        'email', 'phone', 'location', 'typing_titles',
    ];

    protected $casts = [
        'typing_titles' => 'array',
    ];
}
