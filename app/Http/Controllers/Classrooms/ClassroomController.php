<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $MyClasses = Classroom::all();
        $Grades = Grade::all();
        return view('pages.MyClasses.My_Classes', compact('MyClasses', 'Grades'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreClassroom $request)
    {
        $List_Classes = $request->List_Classes;

        //  return $List_Classes;

        try {

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();

                $My_Classes->name_class = ['en' => $List_Class['name_class_en'], 'ar' => $List_Class['name']];

                $My_Classes->grade_id = $List_Class['grade_id'];

                $My_Classes->save();

            }

            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        try {

            $Classrooms = Classroom::findOrFail($request->id);
            $Classrooms->update([

                $Classrooms->grade_id = $request->Grade_id,
            ]);

            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name,
            ];
            $Classrooms->setTranslations('name_class', $translations);
            $Classrooms->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }

    public function Filter_Classes(Request $request)
    {
        // return $request;
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('grade_id', '=', $request->grade_id)->get();
        // return $Search;
        return view('pages.MyClasses.My_Classes', compact('Grades'))->withDetails($Search);

    }

}