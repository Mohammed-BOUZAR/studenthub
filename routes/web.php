<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\TeacherAuthController;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', [Controller::class, 'index']);
Route::get('/about', [Controller::class, 'about']);
Route::post('/subscribe', [Controller::class, 'subscribe']);

Route::group(['prefix' => 'admin'], function () {
    // Admin routes here
    Route::get('/', [AdminAuthController::class, 'index']);
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('/update_profile', [AdminAuthController::class, 'update_profile']);
    Route::get('/teacher_pending', [AdminAuthController::class, 'teacher_pending']);
    Route::get('/teacher_profile', [AdminAuthController::class, 'teacher_profile']);
    Route::get('/update_teacher_profile/{id}', [AdminAuthController::class, 'update_teacher_profile']);
    Route::get('/update_student_profile/{id}', [AdminAuthController::class, 'update_student_profile']);
    Route::get('/student_profile', [AdminAuthController::class, 'student_profile']);
    Route::get('/add_department', [AdminAuthController::class, 'add_department']);
    Route::get('/manage_department', [AdminAuthController::class, 'manage_department']);
    Route::get('/update_department/{id}', [AdminAuthController::class, 'update_department']);
    Route::get('/add_session', [AdminAuthController::class, 'add_session']);
    Route::get('/manage_session', [AdminAuthController::class, 'manage_session']);
    Route::get('/update_session/{id}', [AdminAuthController::class, 'update_session']);
    Route::get('/add_semester', [AdminAuthController::class, 'add_semester']);
    Route::get('/manage_semester', [AdminAuthController::class, 'manage_semester']);
    Route::get('/update_semester/{id}', [AdminAuthController::class, 'update_semester']);
    Route::get('/add_subject', [AdminAuthController::class, 'add_subject']);
    Route::get('/manage_subject', [AdminAuthController::class, 'manage_subject']);
    Route::get('/update_subject/{id}', [AdminAuthController::class, 'update_subject']);
    Route::get('/add_noticeboard', [AdminAuthController::class, 'add_noticeboard']);
    Route::get('/add_result', [AdminAuthController::class, 'add_result']);
    Route::get('/add_material', [AdminAuthController::class, 'add_material']);
    Route::get('/add_quiz', [AdminAuthController::class, 'add_quiz']);
    Route::post('/add_questions', [AdminAuthController::class, 'add_questions']);
    Route::get('/quiz_detail/{id}', [AdminAuthController::class, 'quiz_detail']);
    Route::get('/update_noticeboard/{id}', [AdminAuthController::class, 'update_noticeboard']);
    Route::get('/update_result/{id}', [AdminAuthController::class, 'update_result']);
    Route::get('/update_material/{id}', [AdminAuthController::class, 'update_material']);
    Route::get('/manage_noticeboard', [AdminAuthController::class, 'manage_noticeboard']);
    Route::get('/manage_result', [AdminAuthController::class, 'manage_result']);
    Route::get('/manage_material', [AdminAuthController::class, 'manage_material']);
    Route::get('/manage_quiz', [AdminAuthController::class, 'manage_quiz']);
    Route::get('/manage_quiz_result', [AdminAuthController::class, 'manage_quiz_result']);
    Route::get('/subscribes', [AdminAuthController::class, 'subscribes']);

    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/logout', [AdminAuthController::class, 'logout']);
    Route::post('/update_profile', [AdminAuthController::class, 'update']);
    Route::post('/add_department', [AdminAuthController::class, 'addDepartment']);
    Route::post('/add_session', [AdminAuthController::class, 'addSession']);
    Route::post('/add_semester', [AdminAuthController::class, 'addSemester']);
    Route::post('/add_subject', [AdminAuthController::class, 'addSubject']);
    Route::post('/add_noticeboard', [AdminAuthController::class, 'addNoticeBoard']);
    Route::post('/add_result', [AdminAuthController::class, 'addResult']);
    Route::post('/add_material', [AdminAuthController::class, 'addMaterial']);
    Route::post('/add_quiz', [AdminAuthController::class, 'addQuiz']);

    Route::get('/approve_{id}', [AdminAuthController::class, 'approveTeacher']);
    Route::get('/approve_teacher_delete/{id}', [AdminAuthController::class, 'approveTeacherDelete']);

    Route::post('/update_department/{id}', [AdminAuthController::class, 'updateDepartment']);
    Route::get('/delete_department/{id}', [AdminAuthController::class, 'deleteDepartment']);
    Route::post('/update_session/{id}', [AdminAuthController::class, 'updateSession']);
    Route::get('/delete_session/{id}', [AdminAuthController::class, 'deleteSession']);
    Route::post('/update_semester/{id}', [AdminAuthController::class, 'updateSemester']);
    Route::get('/delete_semester/{id}', [AdminAuthController::class, 'deleteSemester']);
    Route::post('/update_subject/{id}', [AdminAuthController::class, 'updateSubject']);
    Route::get('/delete_subject/{id}', [AdminAuthController::class, 'deleteSubject']);
    Route::post('/update_noticeboard/{id}', [AdminAuthController::class, 'updateNoticeBoard']);
    Route::get('/delete_noticeboard/{id}', [AdminAuthController::class, 'deleteNoticeBoard']);
    Route::post('/update_result/{id}', [AdminAuthController::class, 'updateResult']);
    Route::get('/delete_result/{id}', [AdminAuthController::class, 'deleteResult']);
    Route::post('/update_material/{id}', [AdminAuthController::class, 'updateMaterial']);
    Route::get('/delete_material/{id}', [AdminAuthController::class, 'deleteMaterial']);
    Route::post('/update_quiz/{id}', [AdminAuthController::class, 'updateQuiz']);
    Route::get('/delete_quiz/{id}', [AdminAuthController::class, 'deleteQuiz']);
});

Route::group(['prefix' => 'teachers'], function () {
    // Admin routes here
    Route::get('/', [TeacherAuthController::class, 'index']);
    Route::get('/dashboard', [TeacherAuthController::class, 'dashboard']);
    Route::get('/login', [TeacherAuthController::class, 'teacherLogin']);
    Route::get('/signup', [TeacherAuthController::class, 'teacherSignup']);
    Route::get('/user_pro', [TeacherAuthController::class, 'show']);
    Route::get('/change_password', [TeacherAuthController::class, 'change_password']);
    Route::get('/add_noticeboard', [TeacherAuthController::class, 'add_noticeboard']);
    Route::get('/add_result', [TeacherAuthController::class, 'add_result']);
    Route::get('/add_material', [TeacherAuthController::class, 'add_material']);
    Route::get('/add_quiz', [TeacherAuthController::class, 'add_quiz']);
    Route::post('/add_questions', [TeacherAuthController::class, 'add_questions']);
    Route::get('/quiz_detail/{id}', [TeacherAuthController::class, 'quiz_detail']);
    Route::get('/manage_noticeboard', [TeacherAuthController::class, 'manage_noticeboard']);
    Route::get('/update_noticeboard/{id}', [TeacherAuthController::class, 'update_noticeboard']);
    Route::get('/manage_result', [TeacherAuthController::class, 'manage_result']);
    Route::get('/update_result/{id}', [TeacherAuthController::class, 'update_result']);
    Route::get('/manage_material', [TeacherAuthController::class, 'manage_material']);
    Route::get('/update_material/{id}', [TeacherAuthController::class, 'update_material']);
    Route::get('/manage_quiz', [TeacherAuthController::class, 'manage_quiz']);
    Route::get('/manage_quiz_result', [TeacherAuthController::class, 'manage_quiz_result']);
    Route::get('/update_teacher_profile', [TeacherAuthController::class, 'update_teacher_profile']);
    Route::get('/teacher_pending', [TeacherAuthController::class, 'teacher_pending']);
    Route::get('/teacher_profile', [TeacherAuthController::class, 'teacher_profile']);
    Route::get('/student_profile', [TeacherAuthController::class, 'student_profile']);
    Route::get('/add_department', [TeacherAuthController::class, 'add_department']);
    Route::get('/manage_department', [TeacherAuthController::class, 'manage_department']);
    Route::get('/add_session', [TeacherAuthController::class, 'add_session']);
    Route::get('/manage_session', [TeacherAuthController::class, 'manage_session']);
    Route::get('/add_semester', [TeacherAuthController::class, 'add_semester']);
    Route::get('/manage_semester', [TeacherAuthController::class, 'manage_semester']);

    Route::post('/signup', [TeacherAuthController::class, 'store']);
    Route::post('/login', [TeacherAuthController::class, 'login']);
    Route::get('/logout', [TeacherAuthController::class, 'logout']);
    Route::post('/update_profile/{id}', [TeacherAuthController::class, 'updateTeacherProfile']);
    Route::get('/approve_teacher_delete/{id}', [TeacherAuthController::class, 'approveTeacherDelete']);
    Route::post('/add_noticeboard', [TeacherAuthController::class, 'addNoticeBoard']);
    Route::post('/add_result', [TeacherAuthController::class, 'addResult']);
    Route::post('/add_material', [TeacherAuthController::class, 'addMaterial']);
    Route::post('/add_quiz', [TeacherAuthController::class, 'addQuiz']);

    Route::post('/update_noticeboard/{id}', [TeacherAuthController::class, 'updateNoticeBoard']);
    Route::get('/delete_noticeboard/{id}', [TeacherAuthController::class, 'deleteNoticeBoard']);
    Route::post('/update_result/{id}', [TeacherAuthController::class, 'updateResult']);
    Route::get('/delete_result/{id}', [TeacherAuthController::class, 'deleteResult']);
    Route::post('/update_material/{id}', [TeacherAuthController::class, 'updateMaterial']);
    Route::get('/delete_material/{id}', [TeacherAuthController::class, 'deleteMaterial']);
    Route::post('/update_quiz/{id}', [TeacherAuthController::class, 'updateQuiz']);
    Route::get('/delete_quiz/{id}', [TeacherAuthController::class, 'deleteQuiz']);
    Route::post('/change_password/{id}', [TeacherAuthController::class, 'updatePassword']);
});

Route::group(['prefix' => 'students'], function () {
    // Admin routes here
    Route::post('/login', [StudentAuthController::class, 'login']);
    Route::get('/', [StudentAuthController::class, 'index']);
    Route::get('/dashboard', [StudentAuthController::class, 'dashboard']);
    Route::get('/login', [StudentAuthController::class, 'studentLogin']);
    Route::get('/signup', [StudentAuthController::class, 'studentSignup']);
    Route::post('/signup', [StudentAuthController::class, 'store']);
    Route::get('/logout', [StudentAuthController::class, 'logout']);
    Route::post('/update_teacher_profile', [StudentAuthController::class, 'update']);
    Route::post('/add_department', [StudentAuthController::class, 'addDepartment']);
    Route::post('/add_session', [StudentAuthController::class, 'addSession']);
    Route::post('/add_semester', [StudentAuthController::class, 'addSemester']);
    Route::post('/add_subject', [StudentAuthController::class, 'addSubject']);
    Route::post('/change_password/{id}', [StudentAuthController::class, 'updatePassword']);
    Route::get('/user_pro', [StudentAuthController::class, 'show']);
    Route::post('/update_profile/{id}', [StudentAuthController::class, 'updateStudentProfile']);
    Route::get('/delete_student_profile/{id}', [StudentAuthController::class, 'deleteStudentProfile']);
    Route::get('/update_student_profile', [StudentAuthController::class, 'update_student_profile']);
    Route::get('/change_password', [StudentAuthController::class, 'change_password']);
    Route::get('/manage_noticeboard', [StudentAuthController::class, 'manage_noticeboard']);
    Route::get('/manage_result', [StudentAuthController::class, 'manage_result']);
    Route::get('/manage_material', [StudentAuthController::class, 'manage_material']);
    Route::get('/manage_quiz', [StudentAuthController::class, 'manage_quiz']);
    Route::get('/check_quiz', [StudentAuthController::class, 'check_quiz']);
    Route::get('/manage_quiz_result', [StudentAuthController::class, 'manage_quiz_result']);
    Route::post('/quiz_details', [StudentAuthController::class, 'quizDetail']);
});
