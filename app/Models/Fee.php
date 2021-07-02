<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{

    use HasTranslations;
    public $translatable = ['title'];
    protected $fillable=['title','amount','grade_id','classroom_id','year','description','Fee_type'];


    // علاقة بين الرسوم الدراسية والمراحل الدراسية لجب اسم المرحلة

    public function grade()
    {
        return $this->belongsTo('App\Models\Grade', 'grade_id');
    }


    // علاقة بين الصفوف الدراسية والرسوم الدراسية لجب اسم الصف

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
}