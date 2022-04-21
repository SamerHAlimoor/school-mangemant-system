<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//==============================Translate all pages============================
Route::group(
  [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
  ], function () {

  //==============================dashboard============================
  Route::get('dashboard/teacher', function () {
      return view('pages.Teachers.dashboard.dashboard');
  });

});