<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['title'];

    public static function boot()
    {
        parent::boot();

        Role::observe(new \App\Observers\UserActionObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required',
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id|max:4294967295|required'
        ];
    }

    /**
     * The permissions that belong to the role.
     */
    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');
    }
}
