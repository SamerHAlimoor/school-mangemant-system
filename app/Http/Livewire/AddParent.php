<?php

namespace App\Http\Livewire;

use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Religion;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddParent extends Component
{
    public $currentStep = 1,

    // Father_INPUTS
    $Email, $Password,
    $Name_Father, $Name_Father_en,
    $National_ID_Father, $Passport_ID_Father,
    $Phone_Father, $Job_Father, $Job_Father_en,
    $Nationality_Father_id, $Blood_Type_Father_id,
    $Address_Father, $Religion_Father_id,

    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en,
    $National_ID_Mother, $Passport_ID_Mother,
    $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, $Blood_Type_Mother_id, $successMessage, $catchError,
    $Address_Mother, $Religion_Mother_id;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'Email' => 'required|email',
            'National_ID_Father' => 'required|string|min:9|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:5|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'National_ID_Mother' => 'required|string|min:9|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:5|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
        ]);
    }

    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationality::all(),
            'Type_Bloods' => Type_Blood::all(),
            'Religions' => Religion::all(),
        ]);

    }

//firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'Email' => 'required|unique:parents,Email,' . $this->id,
            'Password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Type_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
        ]);
        $this->currentStep = 2;
    }

//secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Type_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
        ]);

        $this->currentStep = 3;
    }
    public function submitForm()
    {

        // protected $fillable = ['email', 'password', 'name_father', 'national_id_father',
        //     'passport_id_father', 'phone_father', 'job_father', 'nationality_father_id',
        //     'blood_type_father_id', 'religion_father_id', 'address_father', 'name_mother', 'national_id_mother', 'passport_id_mother', 'phone_mother',
        //     'job_mother', 'nationality_mother_id', 'blood_type_mother_id', 'religion_mother_id', 'address_mother',
        // ];

        try {
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->Email;
            $My_Parent->password = Hash::make($this->Password);
            $My_Parent->name_father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->national_id_father = $this->National_ID_Father;
            $My_Parent->passport_id_father = $this->Passport_ID_Father;
            $My_Parent->phone_father = $this->Phone_Father;
            $My_Parent->job_father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->nationality_father_id = $this->Nationality_Father_id;
            $My_Parent->blood_type_father_id = $this->Blood_Type_Father_id;
            $My_Parent->religion_father_id = $this->Religion_Father_id;
            $My_Parent->address_father = $this->Address_Father;

            // Mother_INPUTS
            $My_Parent->name_mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->national_id_mother = $this->National_ID_Mother;
            $My_Parent->passport_id_mother = $this->Passport_ID_Mother;
            $My_Parent->phone_mother = $this->Phone_Mother;
            $My_Parent->job_mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->nationality_mother_id = $this->Nationality_Mother_id;
            $My_Parent->blood_type_mother_id = $this->Blood_Type_Mother_id;
            $My_Parent->religion_mother_id = $this->Religion_Mother_id;
            $My_Parent->address_mother = $this->Address_Mother;
            $My_Parent->save();
            $this->successMessage = trans('messages.success');
            $this->clearForm();
            $this->currentStep = 1;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };

    }

    //clearForm
    public function clearForm()
    {
        $this->Email = '';
        $this->Password = '';
        $this->Name_Father = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Name_Father_en = '';
        $this->National_ID_Father = '';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Type_Father_id = '';
        $this->Address_Father = '';
        $this->Religion_Father_id = '';

        $this->Name_Mother = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Name_Mother_en = '';
        $this->National_ID_Mother = '';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Type_Mother_id = '';
        $this->Address_Mother = '';
        $this->Religion_Mother_id = '';

    }
//back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}