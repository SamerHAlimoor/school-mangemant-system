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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
  //  Auth::routes();
   
    Route::get('/', 'HomeController@home')->name('home');

    Route::group(['namespace' => 'Auth'], function () {

        Route::get('/login/{type}','LoginController@formLogin')->middleware('guest')->name('login.show');
        
        Route::post('/login','LoginController@login')->name('login');
        Route::get('/logout/{type}', 'LoginController@logout')->name('logout');
        

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

    Route::view('addParent', 'livewire.show_Form')->name('add_parent');


      //==============================Students============================
      Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('online_classes', 'OnlineClasseController');
        Route::resource('Promotion', 'PromotionController');
        Route::resource('Fees', 'Fees\FeesController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');
        Route::resource('receipt_students', 'ReceiptStudentsController');
        Route::resource('ProcessingFee', 'ProcessingFeeController');
        Route::resource('Attendance', 'AttendanceController');
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
        Route::resource('library', 'LibraryController');
        Route::resource('Payment_students', 'PaymentController');
        Route::post('/graduation', 'StudentController@graduation')->name('Students.graduation');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::get('/details/{id}', 'StudentController@Get_Details')->name('Students.details');
//Attachment in student
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
          //==============================Subjects============================
   



        


    });

    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
    });
  /*  Route::group(['namespace' => 'Exams'], function () {
        Route::resource('Exams', 'ExamController');
    });*/
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });
  
 //==============================questions============================
 Route::group(['namespace' => 'questions'], function () {
    Route::resource('questions', 'QuestionController');
});


 //==============================Setting============================
 Route::resource('settings', 'SettingController');


 
     //==============================Promotion Students ============================
   /*  Route::group(['namespace' => 'Students'], function () {
        Route::resource('Promotion', 'PromotionController');
    });
*/



});