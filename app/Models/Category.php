<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Kalnoy\Nestedset\NodeTrait;

    class Category extends Model
    {
        use NodeTrait;

        protected $table = 'categories';

        protected $fillable = [
            'title',
            'description',
            'slug',
            'published',
            'section_id',
            'parent_id',
            '_lft',
            '_rgt',
        ];

        /**
         * @return string
         */
        public static function getTree()
        {
            $categories = self::get()->toTree();
            $traverse   = function ($categories, $prefix = '') use (&$traverse, &$allCats) {
                foreach ($categories as $category) {
                    $allCats[] = ["title" => $prefix.' '.$category->title, "id" => $category->id];
                    $traverse($category->children, $prefix.'-');
                }

                return $allCats;
            };

            return $traverse($categories);
        }

        /**
         * @return HasMany
         */
        public function categories(): HasMany
        {
            return $this->hasMany(Category::class, 'parent_id');
        }

        /**
         * @return HasMany
         */
        public function childrenCategories(): HasMany
        {
            return $this->hasMany(Category::class, 'parent_id')->with('categories');
        }

        /**
         * @param $slug
         *
         * @return mixed|string
         */
        public function incrementSlug($slug): mixed
        {
            $original = $slug;
            $count    = 2;
            while (static::whereSlug($slug)->exists()) {
                $slug = "{$original}-".$count++;
            }

            return $slug;
        }

        /**
         * @return BelongsTo
         */
        public function section(): BelongsTo
        {
            return $this->belongsTo(Section::class, 'section_id', 'id');
        }

        /**
         * @return string
         */
        public function getParentsNames()
        {
            if ($this->parent) {
                return $this->parent->getParentsNames();
            } else {
                return $this->title;
            }
        }
    }
