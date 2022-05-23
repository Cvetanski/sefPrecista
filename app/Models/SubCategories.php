<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'id',
        'title',
        'description',
        'category_id',
        'slug'
    ];

    public function categories()
    {
        return $this->belongsTo(Categories::class,'category_id','id');
    }
}
