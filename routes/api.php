<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Teacher\MyTeachingController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Teacher\MaterialController as TeacherMaterialController;
use App\Http\Controllers\Student\MyClassController;
use App\Http\Controllers\Student\MaterialController as StudentMaterialController;
use App\Http\Controllers\Student\PlanningController;
use App\Http\Controllers\Teacher\QuizController;
use App\Http\Controllers\Teacher\QuizQuestionController;
use App\Http\Controllers\Teacher\MyStudentController;
use App\Http\Controllers\Api\Student\PlanningApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Temporary test route
Route::get('/test', function() {
    return response()->json(['message' => 'Test route works!']);
});

// Public Review Routes (only for viewing)
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

// Protected API Routes (Requires authentication)
Route::middleware('auth:sanctum')->group(function () {
    // User Info and Logout
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Student specific routes
    Route::prefix('student')->group(function () {
        // Reviews
        Route::get('/reviews', [ReviewController::class, 'index']);
        Route::post('/reviews', [ReviewController::class, 'store']);
        Route::get('/reviews/{id}', [ReviewController::class, 'show']);
        Route::put('/reviews/{id}', [ReviewController::class, 'update']);
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
        
        // Classes
        Route::get('/classes', [MyClassController::class, 'listClasses']);
        Route::get('/classes/{class}/materials', [MyClassController::class, 'listMaterials']);
        Route::get('/classes/{class}/quizzes', [MyClassController::class, 'quizzes']);
        Route::post('/classes/{class}/quizzes/{quiz}/submit', [MyClassController::class, 'submitQuiz']);
        
        // Materials
        Route::get('/materials/{material}/download', [StudentMaterialController::class, 'download']);
        
        // Planning
        Route::apiResource('planning', PlanningController::class);

        // Plans
        Route::apiResource('plans', PlanningApiController::class);
    });
    
    
    // Teacher specific routes
    Route::middleware('role:2')->prefix('teacher')->group(function () {
        // Teaching Classes
        Route::apiResource('teaching-classes', MyTeachingController::class);
        
        // Materials
        Route::apiResource('materials', TeacherMaterialController::class);
        Route::get('materials/{material}/download', [TeacherMaterialController::class, 'download']);
        
        // Quizzes
        Route::apiResource('quizzes', QuizController::class);
        Route::apiResource('quizzes.questions', QuizQuestionController::class);
        
        // Students
        Route::get('students', [MyStudentController::class, 'index']);
        Route::get('students/{student}', [MyStudentController::class, 'show']);
    });
});
