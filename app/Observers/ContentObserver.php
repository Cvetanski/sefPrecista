<?php

    namespace App\Observers;

    use App\Models\Content;
    use Illuminate\Support\Str;

    class ContentObserver
    {
        public function creating(Content $content): void
        {
            $slug = Str::slug($content->title);
            if (Content::whereSlug($slug)->count() > 0) {
                $content->slug = $slug;
            }
            $content->slug = $content->incrementSlug($slug);
        }
    }