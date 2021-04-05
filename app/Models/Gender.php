<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Gender extends Model
{

    use HasTranslations;
    protected $table = 'genders';

  
    public $translatable = ['name'];
    protected $fillable =['name'];

    

}