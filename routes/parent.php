<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//==============================Translate all pages============================
Route::group(
  [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:parent']
  ], function () {

  //==============================dashboard============================
  Route::get('dashboard/parents', function () {
      return view('pages.parents.dashboard');
  });

});