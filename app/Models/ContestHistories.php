<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ContestHistories
 * @package App\Models
 * @version April 12, 2021, 1:34 pm UTC
 *
 * @property \App\Models\Questions $question
 * @property \App\Models\User $user
 * @property integer $user_id
 * @property integer $question_id
 */
class ContestHistories extends Model
{


    public $table = 'contest_histories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'contest_id',
        'question_id',
        'answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'contest_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'contest_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function getContest()
    {
        return $this->belongsTo(\App\Models\Contest::class, 'contest_id');
    }
    public function getQuestions()
    {
        return $this->belongsTo(\App\Models\Questions::class, 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
