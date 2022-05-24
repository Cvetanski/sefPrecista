<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $description
 * @property string $slug
 * @property string|null $cover_image
 * @property string|null $image2
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereCoverImage($value)
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereDescription($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereImage2($value)
 * @method static Builder|News whereShortDescription($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @mixin Eloquent
 */
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
