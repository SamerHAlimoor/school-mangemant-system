<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'guest']], function () {
    Auth::routes();
    Route::get('/', function () {
        return view('auth.login');
    });

});

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('Grades', 'GradeController');
    });

    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

    });

    //==============================Sections============================

    Route::group(['namespace' => 'Sections'], function () {

        Route::resource('Sections', 'SectionController');

        Route::get('/classes/{id}', 'SectionController@getclasses');

    });

    //==============================teacher ============================

    
    Route::group(['namespace' => 'Teacher'], function () {

        Route::resource('Teacher', 'TeacherController');
        Route::get('Teacher/details/{id}', 'TeacherController@Get_Details')->name('Teacher.details');



    });

    //==============================[parent]============================

    Route::view('addParent', 'livewire.show_Form');


      //==============================Students============================
      Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Fees', 'Fees\FeesController');
        Route::post('/graduation', 'StudentController@graduation')->name('Students.graduation');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::get('/details/{id}', 'StudentController@Get_Details')->name('Students.details');
//Attachment in student
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');


        


    });

     //==============================Promotion Students ============================
   /*  Route::group(['namespace' => 'Students'], function () {
        Route::resource('Promotion', 'PromotionController');
    });
*/



});