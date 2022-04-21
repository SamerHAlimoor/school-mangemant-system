<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use SoftDeletes;

    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];
    
  // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
  public function specializations()
  {
      return $this->belongsTo('App\Models\Specialization', 'specialization_id');
  }

  // علاقة بين الطلاب والانواع لجلب جنس الطالب
  public function genders()
  {
      return $this->belongsTo('App\Models\Gender', 'gender_id');
  }

  // علاقة المعلمين مع الاقسام
public function Sections()
{
    return $this->belongsTo('App\Models\Section','section_id');
}
public function Grade()
{
    return $this->belongsTo('App\Models\Grade','grade_id');
}
public function Classrooms()
{
    return $this->belongsTo('App\Models\Classroom','classroom_id');
}



public function Nationality()
{
    return $this->belongsTo('App\Models\Nationality','nationalitie_id');
}
public function parents()
{
    return $this->belongsTo('App\Models\MyParent','parent_id');
}


// علاقة بين الطلاب والصور لجلب اسم الصور  في جدول الطلاب
public function images()
{
    return $this->morphMany('App\Models\Image', 'imageable');
    //it used by Polymorphic 
}
// علاقة بين جدول سدادت الطلاب وجدول الطلاب لجلب اجمالي المدفوعات والمتبقي
public function student_account()
{
    return $this->hasMany('App\Models\StudentAccount', 'student_id');

}


// علاقة بين جدول الطلاب وجدول الحضور والغياب
public function attendance()
{
    return $this->hasMany('App\Models\Attendance', 'student_id');
}
}