<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\Auth;


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
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function contest()
    {
        return $this->belongsTo(\App\Models\Contest::class, 'contest_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
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

    public static function make($contest_id, $user_id)
    {
        $contest = Contest::findOrFail($contest_id);

        $question_count = $contest->question_count;

        $subjects = json_decode($contest->subjects);

        $userQuestions = [];
        foreach ($subjects as $subject) {
            $count = Questions::where(['subject_id' => $subject->subject_id])->count();
            $questions = Questions::where([
                'subject_id' => $subject->subject_id
            ])->get()->random(min($subject->count, $count));
            foreach ($questions as $question){
                ContestHistories::create([
                    'user_id' => Auth::id(),
                    'question_id' => $question->id,
                    'contest_id' => $contest->id,
                    'answer' => $question->editor
                ]);
            }
        }
    }
    public function getCompileAttribute(){
        return self::compile($this->answer);
    }
    /**
     * @param $code
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function compile($code){
        $client = new Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $response = $client->post('checker:5000/check', [
            \GuzzleHttp\RequestOptions::JSON => ['code' => $code],
            'content-type' => 'application/json',
        ]);
        return json_decode($response->getBody(), true);
    }
}
