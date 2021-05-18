<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Contest
 * @package App\Models
 * @version April 12, 2021, 1:33 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $contestQuestions
 * @property string $title
 * @property string|\Carbon\Carbon $begin_date
 * @property integer $duration
 */
class Contest extends Model
{


    public $table = 'contest';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'title',
        'begin_date',
        'duration',
        'subjects',
        'question_count'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'begin_date' => 'datetime',
        'duration' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|string|max:255',
        'begin_date' => 'required',
        'duration' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
//    public function getSubjects()
//    {
//        return $this->hasMany(\App\Models\Subjects::class, 'subjects');
//    }

    public function getContestParsedAttribute(){
        return json_decode($this->subjects);
    }
    public function toStart(){
        return strtotime($this->begin_date)- time();
    }
    public function isStart(){
        return $this->toStart() <= 0;
    }
    public function toFinish(){
        return  strtotime($this->begin_date) + $this->duration * 60 - time();
    }
    public function isFinish(){
        return $this->toFinish() <= 0;
    }
}
