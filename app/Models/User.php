<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
        'fullname',
        'gender',
        'birthday',
        'avatar',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @const role
     */
    const ROLE_SUPER_ADMIN = 1;
    const ROLE_ADMIN = 2;
    const ROLE_AUTHOR = 3;

    const GENDER_MALE =1;
    const GENDER_FEMALE =2;

    /**
     * Get avaiable roles
     *
     * @return array
     */
    public static function roles()
    {
        return [
            self::ROLE_ADMIN => trans('common.user.role_admin'),
            self::ROLE_AUTHOR => trans('common.user.role_author'),
        ];
    }

    /**
     * Get avaiable gender setting
     *
     * @return array
     */
    public static function genders()
    {
        return [
            self::GENDER_MALE => trans('common.user.gender_male'),
            self::GENDER_FEMALE => trans('common.user.gender_female'),
        ];
    }

    /**
     * set user password
     *
     * @param string $avalue
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        if ($value) {
            if (\Hash::needsRehash($value)) {
                $this->attributes['password'] = \Hash::make($value);
            } else {
                $this->attributes['password'] = $value;
            }
        }
    }

    /**
     * Get user's role name
     *
     * @return string
     */
    public function getRoleNameAttribute()
    {
        $roleNames = self::roles();

        if (isset($this->role) && isset($roleNames[$this->role])) {
            return $roleNames[$this->role];
        }

        return null;
    }

    /**
     * Get user's avatar
     * @return url
     */
    public function getImageAttribute()
    {
        if (!empty($this->attributes['avatar'])) {
            return url('upload/avatar') . '/' . $this->attributes['avatar'];
        } else {
            return url('upload/avatar') . '/' . 'user.png';
        }
    }

    /**
     * Add some user's role functions
     */
    public function isAdmin()
    {
        return $this->role == self::ROLE_SUPER_ADMIN || $this->role == self::ROLE_ADMIN;
    }

    public function isAuthor()
    {
        return $this->role == self::ROLE_AUTHOR;
    }

    public function isSuperAdmin()
    {
        return $this->role == self::ROLE_SUPER_ADMIN;
    }
}
