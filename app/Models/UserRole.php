<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserRole
 *
 * @property int $user_id
 * @property int $role_id
 * @method static Builder|UserRole newModelQuery()
 * @method static Builder|UserRole newQuery()
 * @method static Builder|UserRole query()
 * @method static Builder|UserRole whereRoleId($value)
 * @method static Builder|UserRole whereUserId($value)
 * @mixin Eloquent
 */
class UserRole extends Model
{
    protected $table = 'user_role';

    protected $fillable = [
        'user_id',
        'role_id',
    ];
}
