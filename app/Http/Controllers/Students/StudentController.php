<?php
namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{



    protected $Student;

    public function __construct(StudentRepository $Student)
    {
        $this->Student = $Student;
    }


    public function index()
    {
        //
        $Students = $this->Student->getAllStudends();
        //$Teachers = Teacher::all();
        return view('pages.Students.student',compact('Students'));

    }


    public function create()
    {
        return $this->Student->Create_Student();
    }

    public function store(StoreStudentsRequest $request)
    {
       return $this->Student->Store_Student($request);
    }



    public function edit($id)
    {
        //
     
        return $this->Student->editStudends($id);
    }


    public function update(StoreStudentsRequest $request)
    {
        
        return $this->Student->UpdateStudends($request);
       // return $request;

        //
    }


    public function destroy(Request $request)
    {
        return $this->Student->DeleteStudends($request);
    }

    public function Get_classrooms($id)
    {
       return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }
    
    public function Get_Details($id)
    {
      return $this->Student->get_Student($id);
        

    }

}

