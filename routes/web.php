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
Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('/index');
});
Route::get('courses', 'CourseController@index');
Route::get('courses/{id}', 'CourseController@show');

Route::middleware(["auth"])->group(function (){
    Route::get("courses/{id}", "CourseController@show");
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::middleware(["auth", "admin"])->prefix("admin")->group(function () {
   Route::redirect("/", "admin/profile");
   Route::resource("programmes", "Admin\ProgrammeController");
   Route::get("programmes/{id}/show", "Admin\ProgrammeController@show");
//   Route::get("programmes/{id}/edit", "Admin\ProgrammeController@edit");

});
