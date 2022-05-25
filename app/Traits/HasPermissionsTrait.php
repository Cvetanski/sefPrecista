<?php

    namespace App\Traits;

    use App\Models\Permission;
    use App\Models\Role;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use LaravelIdea\Helper\App\Models\_IH_Permission_C;

    trait HasPermissionsTrait
    {
        /**
         * @param ...$permissions
         *
         * @return $this
         */
        public function givePermissionsTo(...$permissions): static
        {
            $permissions = $this->getAllPermissions($permissions);
            $this->permissions()->saveMany($permissions);

            return $this;
        }

        /**
         * @param ...$permissions
         *
         * @return $this
         */
        public function withdrawPermissionsTo(...$permissions): static
        {
            $permissions = $this->getAllPermissions($permissions);
            $this->permissions()->detach($permissions);

            return $this;
        }

        /**
         * @param ...$permissions
         *
         */
        public function refreshPermissions(...$permissions): User|m
        {
            $this->permissions()->detach();

            return $this->givePermissionsTo($permissions);
        }

        /**
         * @param $permission
         *
         * @return bool
         */
        public function hasPermissionTo($permission): bool
        {
            return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
        }

        /**
         * @param $permission
         *
         * @return bool
         */
        public function hasPermissionThroughRole($permission): bool
        {
            foreach ($permission->roles as $role) {
                if ($this->roles->contains($role)) {
                    return true;
                }
            }

            return false;
        }

        /**
         * @param ...$roles
         *
         * @return bool
         */
        public function hasRole(...$roles): bool
        {
            foreach ($roles as $role) {
                if ($this->roles->contains('slug', $role)) {
                    return true;
                }
            }

            return false;
        }

        /**
         * @return BelongsToMany
         */
        public function roles(): BelongsToMany
        {
            return $this->belongsToMany(Role::class, 'user_role');
        }

        /**
         * @return Role|null
         */
        public function user_role(): ?Role
        {
            return $this->roles->first();
        }

        /**
         * @return BelongsToMany
         */
        public function permissions(): BelongsToMany
        {
            return $this->belongsToMany(Permission::class, 'user_permission');
        }

        /**
         * @param $permission
         *
         * @return bool
         */
        protected function hasPermission($permission): bool
        {
            return (bool)$this->permissions->where('slug', $permission->slug)->count();
        }

        /**
         * @param  array  $permissions
         *
         * @return Permission[]|_IH_Permission_C
         */
        protected function getAllPermissions(array $permissions): _IH_Permission_C|array
        {
            return Permission::whereIn('slug', $permissions)->get();
        }
    }
