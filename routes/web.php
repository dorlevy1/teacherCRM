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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/students',[\App\Models\Student::class,'students.index']);
Route::store('/students',[\App\Models\Student::class,'students.store']);
Route::get('/students/create',[\App\Models\Student::class,'students.create']);
Route::post('/students/{id}',[\App\Models\Student::class,'students.update']);
Route::get('/students/{id}/edit',[\App\Models\Student::class,'students.edit']);

Route::get('/meetings',[\App\Models\Meeting::class,'meeting.index']);
Route::store('/meetings',[\App\Models\Student::class,'meetings.store']);
Route::get('/meetings/add',[\App\Models\Student::class,'meetings.create']);
Route::post('/meetings/{id}',[\App\Models\Student::class,'meetings.update']);
Route::get('/meetings/{id}/edit',[\App\Models\Student::class,'meetings.edit']);


Route::get('/leads',[\App\Models\LeadsGenerate::class,'leads.index']);
Route::post('/leads/generate',[\App\Models\LeadsGenerate::class,'leads.store']);


Route::get('/students/{id}/details',[\App\Models\UserDetail::class,'students.details.index']);
Route::post('/students/{id}/details',[\App\Models\Student::class,'students.details.update']);
Route::get('/students/{id}/details/edit',[\App\Models\Student::class,'students.details.edit']);
