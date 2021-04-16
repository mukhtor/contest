<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class ContestQuestions
 * @package App\Models
 * @version April 12, 2021, 1:33 pm UTC
 *
 * @property \App\Models\Contest $contest
 * @property \App\Models\Questions $question
 * @property integer $contest_id
 * @property integer $question_id
 */
class ContestQuestions extends Model
{


    public $table = 'contest_questions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'contest_id',
        'question_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'contest_id' => 'integer',
        'question_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'contest_id' => 'required',
        'question_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contest()
    {
        return $this->belongsTo(\App\Models\Contest::class, 'contest_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function question()
    {
        return $this->belongsTo(\App\Models\Questions::class, 'question_id');
    }
}
