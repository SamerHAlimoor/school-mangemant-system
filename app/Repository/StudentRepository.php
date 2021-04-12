<?php 

namespace App\Repository;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\Hash;


class StudentRepository implements StudentRepositoryInterface{

   
    public function Create_Student(){

        $data['my_classes'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationality::all();
        $data['bloods'] = Type_Blood::all();
        return view('pages.Students.add',$data);
 
     }
 
     public function Get_classrooms($id){
 
         $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");
         return $list_classes;
 
     }
 
     //Get Sections
     public function Get_Sections($id){
 
         $list_sections = Section::where("class_id", $id)->pluck("name_section", "id");
         return $list_sections;
     }
 
     public function Store_Student($request){
 
         try {
             $students = new Student();
             $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
             $students->email = $request->email;
             $students->password = Hash::make($request->password);
             $students->gender_id = $request->gender_id;
             $students->nationalitie_id = $request->nationalitie_id;
             $students->blood_id = $request->blood_id;
             $students->Date_Birth = $request->Date_Birth;
             $students->Grade_id = $request->Grade_id;
             $students->classroom_id  = $request->Classroom_id;
             $students->section_id = $request->section_id;
             $students->parent_id = $request->parent_id;
             $students->academic_year = $request->academic_year;
             $students->save();
             toastr()->success(trans('messages.success'));
             return redirect()->route('Students.index');
         }
 
         catch (\Exception $e){
             return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
 
     }
 
 
     public function getAllStudends(){
        return Student::all();


     }

     // Get specialization
     public function Getspecialization(){}
  
     // Get Gender
     public function GetGender(){}
  
     // StoreTeachers
     public function StoreStudends($request){}
  
     // StoreTeachers
     public function editStudends($id){
        return Student::findOrFail($id);
     }
  
     // UpdateTeachers
     public function UpdateStudends($request){
        try {
            $students = Student::findOrFail($request->id);
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->classroom_id  = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Students.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
     }
  
     // DeleteTeachers
     public function DeleteStudends($request){
        Student::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.index');
     }
}
 

