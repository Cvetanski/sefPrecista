<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News  extends  Model
{
    protected  $table = 'news';

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'slug',
        'image2',
        'cover_image',
    ];
}
