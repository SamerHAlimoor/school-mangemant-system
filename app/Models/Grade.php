<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{

    use HasTranslations;
    protected $table = 'grades';

    public $translatable = ['name'];

    protected $fillable = ['name', 'notes'];
    public $timestamps = true;

}