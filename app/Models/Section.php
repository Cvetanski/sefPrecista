<?php

    namespace App\Models;

    use Barryvdh\LaravelIdeHelper\Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Carbon;
    use Kalnoy\Nestedset\Collection;

    /**
 * App\Models\Section
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @method static Builder|Section newModelQuery()
 * @method static Builder|Section newQuery()
 * @method static Builder|Section query()
 * @method static Builder|Section whereCreatedAt($value)
 * @method static Builder|Section whereDescription($value)
 * @method static Builder|Section whereId($value)
 * @method static Builder|Section whereSlug($value)
 * @method static Builder|Section whereTitle($value)
 * @method static Builder|Section whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Section extends Model
    {
        protected $table = 'sections';

        protected $fillable = [
            'title',
            'description',
            'slug',
        ];

        public function categories()
        {
            return $this->hasMany(Category::class, 'section_id', 'id');
        }
    }
