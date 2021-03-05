<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nationality extends Model
{
    use HasTranslations;
    protected $table = 'nationalities';

    public $translatable = ['name'];
    protected $fillable = ['name'];

}
