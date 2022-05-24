<?php

    namespace App\Models;

    use Barryvdh\LaravelIdeHelper\Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;

    /**
 * App\Models\Content
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $image2
 * @property string $description
 * @property string $slug
 * @property string $publication_status
 * @property int $category_id
 * @property int|null $sub_category_id
 * @property int|null $section_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Category $category
 * @property-read Section|null $section
 * @method static Builder|Content newModelQuery()
 * @method static Builder|Content newQuery()
 * @method static Builder|Content query()
 * @method static Builder|Content whereCategoryId($value)
 * @method static Builder|Content whereCreatedAt($value)
 * @method static Builder|Content whereDescription($value)
 * @method static Builder|Content whereId($value)
 * @method static Builder|Content whereImage2($value)
 * @method static Builder|Content wherePublicationStatus($value)
 * @method static Builder|Content whereSectionId($value)
 * @method static Builder|Content whereShortDescription($value)
 * @method static Builder|Content whereSlug($value)
 * @method static Builder|Content whereSubCategoryId($value)
 * @method static Builder|Content whereTitle($value)
 * @method static Builder|Content whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
