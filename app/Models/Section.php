<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    public function categories()
    {
        return $this->hasMany(Categories::class,'section_id','id');
    }
}
