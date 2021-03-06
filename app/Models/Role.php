<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'Super Administrator',
    ];

    public function permissions() {

        return $this->belongsToMany(Permission::class,'role_permission');

    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_role','user_id');
    }
}
