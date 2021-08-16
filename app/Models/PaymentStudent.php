<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PaymentStudent  extends Model
{

//public $translatable = ['name_class'];
    protected $table = 'Classrooms';
  //  protected $fillable = ['name_class', 'grade_id'];
    //public $timestamps = true;

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}