<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Questions
 * @package App\Models
 * @version April 12, 2021, 1:57 pm UTC
 *
 * @property \App\Models\Subject $subject
 * @property \Illuminate\Database\Eloquent\Collection $contestHistories
 * @property \Illuminate\Database\Eloquent\Collection $contestQuestions
 * @property string $questions
 * @property string $editor
 * @property integer $subject_id
 */
class Questions extends Model
{


    public $table = 'questions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'questions',
        'editor',
        'subject_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'questions' => 'string',
        'editor' => 'string',
        'subject_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'questions' => 'required|string',
        'editor' => 'required|string',
        'subject_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function getSubject()
    {
        return $this->belongsTo(\App\Models\Subjects::class, 'subject_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contestHistories()
    {
        return $this->hasMany(\App\Models\ContestHistories::class, 'question_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function contestQuestions()
    {
        return $this->hasMany(\App\Models\ContestQuestions::class, 'question_id');
    }
}
