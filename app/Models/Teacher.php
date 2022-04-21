<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{

    use HasTranslations;
    protected $table = 'teachers';

    public $translatable = ['name'];
    protected $fillable = ['name', 'email','password','gender_id', 'joining_date','specialization_id','address'];
    // or use this  protected $guarded=[]; it mean everything is requrie

    public $timestamps = true;

      // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
      public function specializations()
      {
          return $this->belongsTo('App\Models\Specialization', 'specialization_id');
      }
  
      // علاقة بين المعلمين والانواع لجلب جنس المعلم
      public function genders()
      {
          return $this->belongsTo('App\Models\Gender', 'gender_id');
      }

      // علاقة المعلمين مع الاقسام
    public function Sections()
    {
        return $this->belongsToMany('App\Models\Section','teacher_section');
    }

    

}