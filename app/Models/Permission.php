<?php

namespace App\Models;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table ='permissions';

    protected $fillable = [
        'name',
        'slug'
    ];

    public function roles() {

        return $this->belongsToMany(Role::class,'role_permission');

    }

    public function users() {

        return $this->belongsToMany(User::class,'user_permission');

    }
}
