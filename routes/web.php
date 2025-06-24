<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Admin;

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
    if (auth()->check()) {
        return redirect()->route(auth()->user()->getRedirectRouteName());
    }
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::middleware('role:1')
        ->prefix('student')
        ->name('student.')
        ->group(function () {
            Route::get('homepage', [Student\HomepageController::class, 'index'])
                ->name('homepage');
            Route::get('myclass', [Student\MyClassController::class, 'index'])
                ->name('myclass');
            Route::get('findclass', [Student\FindClassController::class, 'index'])
                ->name('findclass');
            Route::get('findclass/{class}', [Student\FindClassController::class, 'show'])->name('findclass.show');
            Route::post('findclass/{class}/purchase', [Student\FindClassController::class, 'purchase'])->name('findclass.purchase');
            Route::get('planning', [Student\PlanningController::class, 'index'])
                ->name('planning');
            Route::post('planning', [Student\PlanningController::class, 'store'])
                ->name('planning.store');
            Route::delete('planning/{plan}', [Student\PlanningController::class, 'destroy'])
                ->name('planning.destroy');
            Route::get('planning/{plan}/edit', [Student\PlanningController::class, 'edit'])
                ->name('planning.edit');
            Route::put('planning/{plan}', [Student\PlanningController::class, 'update'])
                ->name('planning.update');
            Route::get('invoice', [Student\InvoiceController::class, 'index'])
                ->name('invoice');
            Route::get('profile', [Student\ProfileController::class, 'index'])
                ->name('profile');
            Route::get('profile/edit', [Student\ProfileController::class, 'edit'])
                ->name('profile.edit');
            Route::delete('profile/delete-picture', [Student\ProfileController::class, 'deleteProfilePicture'])
                ->name('profile.delete-picture');
            Route::put('profile', [Student\ProfileController::class, 'update'])
                ->name('profile.update');
            Route::get('timetable', [Student\TimetableController::class, 'index'])
                ->name('timetable');
            Route::get('myclass/{currentClass}/materials', [Student\MyClassController::class, 'materials'])->name('myclass.materials');
            Route::get('myclass/{class}/quizzes', [Student\MyClassController::class, 'quizzes'])->name('myclass.quizzes');
            Route::get('myclass/{class}/quizzes/{quiz}/do', [Student\MyClassController::class, 'doQuiz'])->name('myclass.quizzes.do');
            Route::post('myclass/{class}/quizzes/{quiz}/do', [Student\MyClassController::class, 'submitQuiz'])->name('myclass.quizzes.submit');
            Route::get('class/{class}/materials/{material}/download', [\App\Http\Controllers\Student\MaterialController::class, 'download'])->name('myclass.materials.download');
            Route::resource('reviews', \App\Http\Controllers\Student\ReviewController::class);
        });

    Route::middleware('role:2')
        ->prefix('teacher')
        ->name('teacher.')
        ->group(function () {
            Route::get('homepage', [Teacher\HomepageController::class, 'index'])
                ->name('homepage');
            Route::get('timetable', [Teacher\TimetableController::class, 'index'])
                ->name('timetable');
            Route::resource('myteaching', Teacher\MyTeachingController::class);
            Route::get('profile', [Teacher\ProfileController::class, 'index'])->name('profile');
            Route::resource('myteaching.materials', Teacher\MaterialController::class);
            Route::get('myteaching/{myteaching}/materials/{material}/download', [Teacher\MaterialController::class, 'download'])->name('myteaching.materials.download');
            Route::resource('myteaching.quizzes', Teacher\QuizController::class);
            Route::resource('myteaching.quizzes.questions', Teacher\QuizQuestionController::class);
            Route::resource('my-student', App\Http\Controllers\Teacher\MyStudentController::class)->only(['index', 'show']);
        });

    Route::middleware('role:3')
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('users', [Admin\UsersController::class, 'index'])
                ->name('users');
            Route::resource('teachers', Admin\TeacherController::class);
            Route::resource('classrooms', Admin\ClassroomController::class);
            Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
            Route::resource('teaching-classes', Admin\TeachingClassController::class)->only(['index', 'show', 'destroy']);
            Route::resource('class-purchases', Admin\ClassPurchaseController::class)->only(['index', 'show', 'update']);
            Route::get('/student-payments', [App\Http\Controllers\Admin\StudentPaymentController::class, 'index'])->name('student-payments.index');
            Route::get('/student-payments/{purchase}', [App\Http\Controllers\Admin\StudentPaymentController::class, 'show'])->name('student-payments.show');
            Route::post('/student-payments/{purchase}/approve', [App\Http\Controllers\Admin\StudentPaymentController::class, 'approve'])->name('student-payments.approve');
            Route::post('/student-payments/{purchase}/reject', [App\Http\Controllers\Admin\StudentPaymentController::class, 'reject'])->name('student-payments.reject');
            Route::get('reviews', [\App\Http\Controllers\Admin\ReviewController::class, 'index'])->name('reviews.index');
        });
});


require __DIR__.'/auth.php';
