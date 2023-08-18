<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Courses;
use App\Models\User;

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

Route::middleware('auth')->group(function () {
    Route::get('/', function () { return Inertia::render('Welcome', [ 'courses' => Courses::OrderBy('id', 'DESC')->get() ]); })->name('home');

    Route::get('/manage-students', function () { return Inertia::render('ManageStudents', [ 'students' => User::where('role', 'student')->OrderBy('id', 'DESC')->get() ]); })->name('manageStudents');
    Route::get('/view-student/{id}', [StudentController::class, 'show'])->name('student.show');

    Route::get('/view-course/{id}', [CoursesController::class, 'show'])->name('course.show');
    Route::get('/watch/{id}', [CoursesController::class, 'watchepisode'])->name('course.watchepisode');
    Route::get('/manage-course', function () { return Inertia::render('ManageCourse', [ 'courses' => Courses::OrderBy('id', 'DESC')->get() ]); })->name('manageCourses');
    
    Route::get('/add-course', function () {return Inertia::render('AddCourse'); })->name('addCourse');
    Route::post('/addcourse', [CoursesController::class, 'store'])->name('course.store');
    Route::delete('/videos/{id}', [CoursesController::class, 'destroy'])->name('course.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('auth/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('auth/{provider}/callback', [ProviderController::class, 'callback']);

require __DIR__.'/auth.php';
