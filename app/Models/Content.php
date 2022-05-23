<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Content extends Model
    {
        protected $table = 'content';

        protected $fillable = [
            'title',
            'description',
            'short_description',
            'publication_status',
            'category_id',
            'sub_category_id',
            'section_id',
            'image2',
        ];

        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id', 'id');
        }

        public function subCategory()
        {
            return $this->belongsTo(SubCategories::class, 'sub_category_id', 'id');
        }

        public function section()
        {
            return $this->belongsTo(Section::class, 'section_id', 'id');
        }
    }
