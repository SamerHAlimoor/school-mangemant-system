<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
class MyParent extends Authenticatable
{
    //
    use HasTranslations;
    protected $table = 'parents';

    public $translatable = ['name_father', 'job_father', 'name_mother', 'job_mother'];
    // protected $fillable = ['email', 'password', 'name_father', 'national_id_father',
    //     'passport_id_father', 'phone_father', 'job_father', 'nationality_father_id',
    //     'blood_type_father_id', 'religion_father_id', 'address_father', 'name_mother', 'national_id_mother', 'passport_id_mother', 'phone_mother',
    //     'job_mother', 'nationality_mother_id', 'blood_type_mother_id', 'religion_mother_id', 'address_mother',
    // ];
    protected $guarded = []; // معناها كل الحقول
}