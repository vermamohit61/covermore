<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Questionair extends Model
{
    use SoftDeletes;

    public $table = 'question';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'question_id',
        'question_title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
