<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /* Fillable fields for Answer model */
    protected $fillable = [
        'text'
    ];

    /* Define belongsTo relationship to Question model */
    public function question() {
        return $this->belongsTo(Question::class);
    }
}
