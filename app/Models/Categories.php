<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'description',
        'slug',
        'published',
        'section_id'
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategories::class,'category_id','id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id','id');
    }

}
