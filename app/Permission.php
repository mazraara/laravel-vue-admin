<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @package App
 * @property string $title
 */
class Permission extends Model
{
    protected $fillable = ['title'];

    protected $table = 'permissions';

    public static function boot()
    {
        parent::boot();

        Permission::observe(new \App\Observers\UserActionObserver);
    }

    public static function storeValidation($request)
    {
        return [
            'title' => 'max:191|required',
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'title' => 'max:191|required',
        ];
    }

    /**
     * The roles that belong to the permissions.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permission_role');
    }
}
