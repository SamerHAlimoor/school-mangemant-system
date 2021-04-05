<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{

    use HasTranslations;
    protected $table = 'teachers';

    public $translatable = ['name_section'];
    protected $fillable = ['name_section', 'grade_id', 'class_id'];

    public $timestamps = true;

    

}