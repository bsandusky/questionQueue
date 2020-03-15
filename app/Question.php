<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /* Fillable fields for Question model */
    protected $fillable = [
        'text'
    ];

    /* Define hasMany relationship to Answer model */
    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
