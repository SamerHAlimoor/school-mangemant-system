<?php
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;
use App\Http\Requests\StoreTeachers;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use App\Repository\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{



    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }


    
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


        $Teachers = $this->Teacher->getAllTeachers();
        //$Teachers = Teacher::all();
        return view('pages.Teachers.teachers',compact('Teachers'));

        //return view('pages.Sections.Sections', compact('Grades', 'list_Grades'));

    }


    public function create()
    {
         $specializations = $this->Teacher->Getspecialization();
         $genders = $this->Teacher->GetGender();
         return view('pages.Teachers.create',compact('specializations','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreTeachers $request)
    {

        return $this->Teacher->StoreTeachers($request);
      

    }

    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.edit',compact('Teachers','specializations','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreTeachers $request)
    {

        return $this->Teacher->UpdateTeachers($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(request $request)
    {

        return $this->Teacher->DeleteTeachers($request);

    }


}