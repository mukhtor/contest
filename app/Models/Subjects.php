<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Subjects
 * @package App\Models
 * @version April 12, 2021, 1:32 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $questions
 * @property string $name
 */
class Subjects extends Model
{


    public $table = 'subjects';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questions()
    {
        return $this->hasMany(\App\Models\Questions::class, 'subject_id');
    }
}
