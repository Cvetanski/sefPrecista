<?php

    namespace App\Models;

    use Barryvdh\LaravelIdeHelper\Eloquent;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Support\Carbon;
    use Kalnoy\Nestedset\Collection;
    use Kalnoy\Nestedset\NodeTrait;
    use Kalnoy\Nestedset\QueryBuilder;

    /**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $slug
 * @property int $_lft
 * @property int $_rgt
 * @property int|null $parent_id
 * @property int $published
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $section_id
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read Collection|Category[] $childrenCategories
 * @property-read int|null $children_categories_count
 * @property-read Category|null $parent
 * @property-read Section $section
 * @method static Collection|static[] all($columns = ['*'])
 * @method static QueryBuilder|Category ancestorsAndSelf($id, array $columns = [])
 * @method static QueryBuilder|Category ancestorsOf($id, array $columns = [])
 * @method static QueryBuilder|Category applyNestedSetScope(?string $table = null)
 * @method static QueryBuilder|Category countErrors()
 * @method static QueryBuilder|Category d()
 * @method static QueryBuilder|Category defaultOrder(string $dir = 'asc')
 * @method static QueryBuilder|Category descendantsAndSelf($id, array $columns = [])
 * @method static QueryBuilder|Category descendantsOf($id, array $columns = [], $andSelf = false)
 * @method static QueryBuilder|Category fixSubtree($root)
 * @method static QueryBuilder|Category fixTree($root = null)
 * @method static Collection|static[] get($columns = ['*'])
 * @method static QueryBuilder|Category getNodeData($id, $required = false)
 * @method static QueryBuilder|Category getPlainNodeData($id, $required = false)
 * @method static QueryBuilder|Category getTotalErrors()
 * @method static QueryBuilder|Category hasChildren()
 * @method static QueryBuilder|Category hasParent()
 * @method static QueryBuilder|Category isBroken()
 * @method static QueryBuilder|Category leaves(array $columns = [])
 * @method static QueryBuilder|Category makeGap(int $cut, int $height)
 * @method static QueryBuilder|Category moveNode($key, $position)
 * @method static QueryBuilder|Category newModelQuery()
 * @method static QueryBuilder|Category newQuery()
 * @method static QueryBuilder|Category orWhereAncestorOf(bool $id, bool $andSelf = false)
 * @method static QueryBuilder|Category orWhereDescendantOf($id)
 * @method static QueryBuilder|Category orWhereNodeBetween($values)
 * @method static QueryBuilder|Category orWhereNotDescendantOf($id)
 * @method static QueryBuilder|Category query()
 * @method static QueryBuilder|Category rebuildSubtree($root, array $data, $delete = false)
 * @method static QueryBuilder|Category rebuildTree(array $data, $delete = false, $root = null)
 * @method static QueryBuilder|Category reversed()
 * @method static QueryBuilder|Category root(array $columns = [])
 * @method static QueryBuilder|Category whereAncestorOf($id, $andSelf = false, $boolean = 'and')
 * @method static QueryBuilder|Category whereAncestorOrSelf($id)
 * @method static QueryBuilder|Category whereCreatedAt($value)
 * @method static QueryBuilder|Category whereDescendantOf($id, $boolean = 'and', $not = false, $andSelf = false)
 * @method static QueryBuilder|Category whereDescendantOrSelf(string $id, string $boolean = 'and', string $not = false)
 * @method static QueryBuilder|Category whereDescription($value)
 * @method static QueryBuilder|Category whereId($value)
 * @method static QueryBuilder|Category whereIsAfter($id, $boolean = 'and')
 * @method static QueryBuilder|Category whereIsBefore($id, $boolean = 'and')
 * @method static QueryBuilder|Category whereIsLeaf()
 * @method static QueryBuilder|Category whereIsRoot()
 * @method static QueryBuilder|Category whereLft($value)
 * @method static QueryBuilder|Category whereNodeBetween($values, $boolean = 'and', $not = false)
 * @method static QueryBuilder|Category whereNotDescendantOf($id)
 * @method static QueryBuilder|Category whereParentId($value)
 * @method static QueryBuilder|Category wherePublished($value)
 * @method static QueryBuilder|Category whereRgt($value)
 * @method static QueryBuilder|Category whereSectionId($value)
 * @method static QueryBuilder|Category whereSlug($value)
 * @method static QueryBuilder|Category whereTitle($value)
 * @method static QueryBuilder|Category whereUpdatedAt($value)
 * @method static QueryBuilder|Category withDepth(string $as = 'depth')
 * @method static QueryBuilder|Category withoutRoot()
 * @mixin Eloquent
 */
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
