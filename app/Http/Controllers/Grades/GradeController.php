<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $grades = Grade::all();
        return view('pages.Grades.Grades', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $Grade = new Grade();
            /*
            $translations = [
            'en' => $request->Name_en,
            'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
             */
            $Grade->name = ['en' => $request->Name_en, 'ar' => $request->name];
            $Grade->notes = $request->notes;
            $Grade->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');
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
    public function update(StoreGrades $request)
    {
        try {
            $validated = $request->validated();
            $grades = Grade::findOrFail($request->id);
            $grades->update([
                $grades->name = ['ar' => $request->name, 'en' => $request->name_en],
                $grades->notes = $request->notes,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
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

        $grades = Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Grades.index');

    }

}