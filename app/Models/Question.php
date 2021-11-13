<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze');
    }
}