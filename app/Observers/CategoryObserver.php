<?php

    namespace App\Observers;

    use App\Models\Category;
    use Illuminate\Support\Str;

    class CategoryObserver
    {
        public function creating(Category $category): void
        {
            $slug = Str::slug($category->title);
            if (Category::whereSlug($slug)->count() > 0) {
                $category->slug = $slug;
            }
            $category->slug = $category->incrementSlug($slug);
        }

    }