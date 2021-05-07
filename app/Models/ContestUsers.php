<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestUsers extends Model
{
    use HasFactory;
    protected $fillable = [
        'contest_id',
        'user_id',
        'status'
    ];
    protected $table = 'contest_user';
    public function contest()
    {
        return $this->belongsTo(\App\Models\Contest::class, 'contest_id');
    }

}
