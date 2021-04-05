<?php
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSections;
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


       return $this->Teacher->getAllTeachers();

        //return view('pages.Sections.Sections', compact('Grades', 'list_Grades'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreSections $request)
    {

        try {

            $validated = $request->validated();
            $Sections = new Section();

            $translations = [
                'en' => $request->Name_Section_En,
                'ar' => $request->Name_Section_Ar,
            ];
            $Sections->setTranslations('name_section', $translations);
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;
            $Sections->status = 1;
            $Sections->save();
            toastr()->success(trans('messages.success'));

            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreSections $request)
    {

        try {
            $validated = $request->validated();
            $Sections = Section::findOrFail($request->id);

            $Sections->name_section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->grade_id = $request->Grade_id;
            $Sections->class_id = $request->Class_id;

            if (isset($request->Status)) {
                $Sections->Status = 1;
            } else {
                $Sections->Status = 2;
            }

            $Sections->save();
            toastr()->success(trans('messages.Update'));

            return redirect()->route('Sections.index');
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
    public function destroy(request $request)
    {

        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');

    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name_class", "id");

        return $list_classes;
    }

}