<?php

use App\Http\Controllers\AdminAuthController;
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


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/update_profile', function () {
    return view('admin.update_profile');
});

Route::get('/admin/teacher_pending', function () {
    return view('admin.teacher_pending');
});

Route::get('/admin/teacher_profile', function () {
    return view('admin.teacher_profile');
});

Route::get('/admin/update_teacher_profile/{id}', function ($id) {
    return view('admin.update_teacher_profile', ['tecid' => $id]);
});

Route::get('/admin/update_student_profile/{id}', function ($id) {
    return view('admin.update_student_profile', ['stdid' => $id]);
});

Route::get('/admin/student_profile', function () {
    return view('admin.student_profile');
});

Route::get('/admin/add_department', function () {
    return view('admin.add_department');
});

Route::get('/admin/manage_department', function () {
    return view('admin.manage_department');
});

Route::get('/admin/update_department/{id}', function ($id) {
    return view('admin.update_department', ['id' => $id]);
});

Route::get('/admin/add_session', function () {
    return view('admin.add_session');
});

Route::get('/admin/manage_session', function () {
    return view('admin.manage_session');
});

Route::get('/admin/update_session/{id}', function ($id) {
    return view('admin.update_session', ['id' => $id]);
});

Route::get('/admin/add_semester', function () {
    return view('admin.add_semester');
});

Route::get('/admin/manage_semester', function () {
    return view('admin.manage_semester');
});

Route::get('/admin/update_semester/{id}', function ($id) {
    return view('admin.update_semester', ['id' => $id]);
});

Route::get('/admin/add_subject', function () {
    return view('admin.add_subject');
});

Route::get('/admin/manage_subject', function () {
    return view('admin.manage_subject');
});

Route::get('/admin/update_subject/{id}', function ($id) {
    return view('admin.update_subject', ['id' => $id]);
});


Route::get('/admin/add_noticeboard', function () {
    return view('admin.add_noticeboard');
});

Route::get('/admin/add_result', function () {
    return view('admin.add_result');
});

Route::get('/admin/add_material', function () {
    return view('admin.add_material');
});

Route::get('/admin/add_quiz', function () {
    return view('admin.add_quiz');
});

Route::get('/admin/quiz_detail/{id}', function ($id) {
    return view('admin.quiz_detail', ['id' => $id]);
});

Route::get('/admin/update_noticeboard/{id}', function ($id) {
    return view('admin.update_noticeboard', ['id' => $id]);
});

Route::get('/admin/update_result/{id}', function ($id) {
    return view('admin.update_result', ['id' => $id]);
});

Route::get('/admin/update_material/{id}', function ($id) {
    return view('admin.update_material', ['id' => $id]);
});



Route::get('/admin/manage_noticeboard', function () {
    return view('admin.manage_noticeboard');
});

Route::get('/admin/manage_result', function () {
    return view('admin.manage_result');
});

Route::get('/admin/manage_material', function () {
    return view('admin.manage_material');
});

Route::get('/admin/manage_quiz', function () {
    return view('admin.manage_quiz');
});

Route::get('/admin/manage_quiz_result', function () {
    return view('admin.manage_quiz_result');
});

Route::get('/admin/subscribes', function () {
    return view('admin.subscribes');
});






Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout']);
Route::post('/admin/update_profile', [AdminAuthController::class, 'update']);
Route::post('/admin/add_department', [AdminAuthController::class, 'addDepartment']);
Route::post('/admin/add_session', [AdminAuthController::class, 'addSession']);
Route::post('/admin/add_semester', [AdminAuthController::class, 'addSemester']);
Route::post('/admin/add_subject', [AdminAuthController::class, 'addSubject']);
Route::post('/admin/add_noticeboard', [AdminAuthController::class, 'addNoticeBoard']);
Route::post('/admin/add_result', [AdminAuthController::class, 'addResult']);
Route::post('/admin/add_material', [AdminAuthController::class, 'addMaterial']);
Route::post('/admin/add_quiz', [AdminAuthController::class, 'addQuiz']);

Route::get('/admin/approve_teacher/{id}', [AdminAuthController::class, 'approveTeacher']);
Route::get('/admin/approve_teacher_delete/{id}', [AdminAuthController::class, 'approveTeacherDelete']);

Route::post('/admin/update_department/{id}', [AdminAuthController::class, 'updateDepartment']);
Route::get('/admin/delete_department/{id}', [AdminAuthController::class, 'deleteDepartment']);
Route::post('/admin/update_session/{id}', [AdminAuthController::class, 'updateSession']);
Route::get('/admin/delete_session/{id}', [AdminAuthController::class, 'deleteSession']);
Route::post('/admin/update_semester/{id}', [AdminAuthController::class, 'updateSemester']);
Route::get('/admin/delete_semester/{id}', [AdminAuthController::class, 'deleteSemester']);
Route::post('/admin/update_subject/{id}', [AdminAuthController::class, 'updateSubject']);
Route::get('/admin/delete_subject/{id}', [AdminAuthController::class, 'deleteSubject']);
Route::post('/admin/update_noticeboard/{id}', [AdminAuthController::class, 'updateNoticeBoard']);
Route::get('/admin/delete_noticeboard/{id}', [AdminAuthController::class, 'deleteNoticeBoard']);
Route::post('/admin/update_result/{id}', [AdminAuthController::class, 'updateResult']);
Route::get('/admin/delete_result/{id}', [AdminAuthController::class, 'deleteResult']);
Route::post('/admin/update_material/{id}', [AdminAuthController::class, 'updateMaterial']);
Route::get('/admin/delete_material/{id}', [AdminAuthController::class, 'deleteMaterial']);
Route::post('/admin/update_quiz/{id}', [AdminAuthController::class, 'updateQuiz']);
Route::get('/admin/delete_quiz/{id}', [AdminAuthController::class, 'deleteQuiz']);



Route::post('/teacher_signup', [TeacherAuthController::class, 'store']);
Route::post('/student_signup', [StudentAuthController::class, 'store']);


Route::post('/teacherlogin', [TeacherAuthController::class, 'login']);
Route::get('/teacher/logout', [TeacherAuthController::class, 'logout']);
Route::post('/teacher/update_profile', [TeacherAuthController::class, 'update']);
Route::post('/teacher/add_department', [TeacherAuthController::class, 'addDepartment']);
Route::post('/teacher/add_session', [TeacherAuthController::class, 'addSession']);
Route::post('/teacher/add_semester', [TeacherAuthController::class, 'addSemester']);
Route::post('/teacher/add_subject', [TeacherAuthController::class, 'addSubject']);
Route::get('/teacher/dashboard', [TeacherAuthController::class, 'index']);


Route::post('/studentlogin', [StudentAuthController::class, 'login']);
Route::get('/student/logout', [StudentAuthController::class, 'logout']);
Route::post('/student/update_teacher_profile', [StudentAuthController::class, 'update']);
Route::post('/student/add_department', [StudentAuthController::class, 'addDepartment']);
Route::post('/student/add_session', [StudentAuthController::class, 'addSession']);
Route::post('/student/add_semester', [StudentAuthController::class, 'addSemester']);
Route::post('/student/add_subject', [StudentAuthController::class, 'addSubject']);
Route::get('/student/dashboard', [StudentAuthController::class, 'index']);

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/teachers', function () {
    return view('teachers');
});

Route::get('/teacherlogin', function () {
    return view('teacherlogin');
});

Route::get('/students', function () {
    return view('students');
});

Route::get('/studentlogin', function () {
    return view('studentlogin');
});

Route::get('/student_signup', function () {
    return view('student_signup');
});

Route::get('/teacher_signup', function () {
    return view('teacher_signup');
});




Route::get('/teacher/user_pro', [TeacherAuthController::class, 'show']);



Route::get('/teacher/change_password', function () {
    return view('teachers.change_password');
});

Route::get('/teacher/add_noticeboard', function () {
    return view('teachers.add_noticeboard');
});

Route::get('/teacher/add_result', function () {
    return view('teachers.add_result');
});

Route::get('/teacher/add_material', function () {
    return view('teachers.add_material');
});

Route::get('/teacher/add_quiz', function () {
    return view('teachers.add_quiz');
});


Route::get('/teacher/manage_noticeboard', function () {
    return view('teachers.manage_noticeboard');
});

Route::get('/teacher/manage_result', function () {
    return view('teachers.manage_result');
});

Route::get('/teacher/manage_material', function () {
    return view('teachers.manage_material');
});

Route::get('/teacher/manage_quiz', function () {
    return view('teachers.manage_quiz');
});

Route::get('/teacher/manage_quiz_result', function () {
    return view('teachers.manage_quiz_result');
});


Route::get('/teacher/update_teacher_profile', function () {
    return view('teachers.update_teacher_profile');
});

Route::get('/teacher/teacher_pending', function () {
    return view('teachers.teacher_pending');
});

Route::get('/teacher/teacher_profile', function () {
    return view('teachers.teacher_profile');
});

Route::get('/teacher/student_profile', function () {
    return view('teachers.student_profile');
});

Route::get('/teacher/add_department', function () {
    return view('teachers.add_department');
});

Route::get('/teacher/manage_department', function () {
    return view('teachers.manage_department');
});

Route::get('/teacher/add_session', function () {
    return view('teachers.add_session');
});

Route::get('/teacher/manage_session', function () {
    return view('teachers.manage_session');
});

Route::get('/teacher/add_semester', function () {
    return view('teachers.add_semester');
});

Route::get('/teacher/manage_semester', function () {
    return view('teachers.manage_semester');
});



Route::get('/student/user_pro', [StudentAuthController::class, 'show']);

Route::get('/student/update_student_profile', function () {
    return view('students.update_student_profile');
});

Route::get('/student/change_password', function () {
    return view('students.change_password');
});

Route::get('/student/manage_noticeboard', function () {
    return view('students.manage_noticeboard');
});

Route::get('/student/manage_result', function () {
    return view('students.manage_result');
});

Route::get('/student/manage_material', function () {
    return view('students.manage_material');
});

Route::get('/student/manage_quiz', function () {
    return view('students.manage_quiz');
});

Route::get('/student/check_quiz', function () {
    return view('students.check_quiz');
});

Route::get('/student/manage_quiz_result', function () {
    return view('students.manage_quiz_result');
});
