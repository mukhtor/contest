<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Users
 * @package App\Models
 * @version April 12, 2021, 1:53 pm UTC
 *
 * @property \App\Models\Group $group
 * @property \Illuminate\Database\Eloquent\Collection $contestHistories
 * @property integer $group_id
 * @property string $name
 * @property string $role
 * @property string $username
 * @property string $password
 * @property string $remember_token
 */
class Users extends Model
{


    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'group_id',
        'name',
        'role',
        'username',
        'password',
        'password_deHash',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'group_id' => 'integer',
        'name' => 'string',
        'role' => 'string',
        'username' => 'string',
        'password' => 'string',
        'password_deHash' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'group_id' => 'required',
        'role' => 'nullable',
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'remember_token' => 'nullable|string|max:100'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function getGroup()
    {
        return $this->belongsTo(\App\Models\Groups::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contestHistories()
    {
        return $this->hasMany(\App\Models\ContestHistories::class, 'user_id');
    }
}
