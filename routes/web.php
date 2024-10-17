<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SoalUjianController;
use App\Http\Controllers\AspirationController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\NilaiUjianController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\LikertScaleController;
use App\Http\Controllers\KategoriSoalController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\TeacherLoginController;
use App\Http\Controllers\VirtualClassController;
use App\Http\Controllers\OperatorLoginController;
use App\Http\Controllers\LearningContentController;
use App\Http\Controllers\TeacherFeedbackController;

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



Route::get('/', [Controller::class, 'portal'])->name('portal.dashboard');

Route::get('/login/student', [StudentLoginController::class, 'studentLoginForm'])->name('student.login');
Route::post('/login/student', [StudentLoginController::class, 'loginStudent'])->name('student.login.post');
Route::post('/logout/student', [StudentLoginController::class, 'logoutStudent'])->name('student.logout');


Route::get('/login/teacher', [TeacherLoginController::class, 'teacherLoginForm'])->name('teacher.login');
Route::post('/login/teacher', [TeacherLoginController::class, 'loginTeacher'])->name('teacher.login.post');
Route::post('/logout/teacher', [TeacherLoginController::class, 'logout'])->name('teacher.logout');

Route::get('/login/operator', [OperatorLoginController::class, 'operatorLoginForm'])->name('operator.login');
Route::post('/login/operator', [OperatorLoginController::class, 'loginOperator'])->name('operator.login.post');
Route::post('/logout/operator', [OperatorLoginController::class, 'logoutOperator'])->name('operator.logout');


Route::group(['middleware' => ['auth', 'operator']], function () {
    Route::get('/operator', [Controller::class, 'showOperatorDashboard'])->name('operator.dashboard');

    Route::get('/operator/teacher-create', [TeacherController::class, 'createTeacher'])->name('operator.teacher.create');
    Route::post('/operator/teacher-create', [TeacherController::class, 'storeTeachersData'])->name('operator.teacher.create');
    Route::get('/operator/teacher-import', [TeacherController::class, 'importTeacher'])->name('operator.teacher.import');
    Route::post('/operator/teacher-import', [TeacherController::class, 'importTeachersData'])->name('operator.teacher.import');
    Route::delete('/operator/teacher/{id}', [TeacherController::class, 'destroy'])->name('operator.teachers.destroy');

    Route::get('/operator/student-create', [StudentController::class, 'createStudent'])->name('operator.student.create');
    Route::post('/operator/student-create', [StudentController::class, 'storeStudentsData'])->name('operator.student.create');
    Route::get('/operator/student-import', [StudentController::class, 'importStudent'])->name('operator.student.import');
    Route::post('/operator/student-import', [StudentController::class, 'importStudentsData'])->name('operator.student.import');
    Route::delete('/operator/student/{id}', [StudentController::class, 'destroy'])->name('operator.student.destroy');

    Route::get('/operator/classroom-create', [ClassroomController::class, 'createClassroom'])->name('operator.classroom.create');
    Route::post('/operator/classroom-create', [ClassroomController::class, 'storeClassroomsData'])->name('operator.classroom.create');
    Route::get('/operator/classroom-import', [ClassroomController::class, 'importClassroom'])->name('operator.classroom.import');
    Route::post('/operator/classroom-import', [ClassroomController::class, 'importClassroomsData'])->name('operator.classroom.import');
    Route::delete('/operator/classroom/{id}', [ClassroomController::class, 'destroy'])->name('operator.classroom.destroy');

    Route::get('/operator/subject-create', [SubjectController::class, 'createSubject'])->name('operator.subject.create');
    Route::post('/operator/subject-create', [SubjectController::class, 'storeSubjectsData'])->name('operator.subject.create');
    Route::get('/operator/subject-import', [SubjectController::class, 'importSubject'])->name('operator.subject.import');
    Route::post('/operator/subject-import', [SubjectController::class, 'importSubjectsData'])->name('operator.subject.import');
    Route::delete('/operator/subject/{id}', [SubjectController::class, 'destroy'])->name('operator.subject.destroy');

    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('/teacher', [Controller::class, 'showTeacherDashboard'])->name('teacher.dashboard');

    Route::get('/teacher/profile', [TeacherController::class, 'showProfile'])->name('teacher.profile');
    Route::put('/teacher/profile/update', [TeacherController::class, 'updateProfile'])->name('teacher.profile.update');


    Route::get('/teacher/learning-content', [LearningContentController::class, 'index'])->name('teacher.learning-content');
    Route::post('/teacher/learning-content', [LearningContentController::class, 'store'])->name('teacher.learning-content.store');
    Route::get('/teacher/content-catalog', [LearningContentController::class, 'contentCatalog'])->name('teacher.content.catalog');
    Route::get('/teacher/content-catalog/show/{id}', [LearningContentController::class, 'show'])->name('teacher.content.show');
    Route::get('/content/download/{id}', [LearningContentController::class, 'downloadFile'])->name('content.download');
    Route::delete('/teacher/learning-content/{id}', [LearningContentController::class, 'destroy'])->name('teacher.content.destroy');
    Route::get('/content/download/{id}', [LearningContentController::class, 'downloadFile'])->name('content.download');

    Route::get('/teacher/virtual-classes', [VirtualClassController::class, 'index'])->name('teacher.virtual-classes');
    Route::post('/teacher/virtual-classes/store', [VirtualClassController::class, 'store'])->name('teacher.virtual-classes.store');
    Route::delete('/teacher/virtual-classes/{id}', [VirtualClassController::class, 'destroy'])->name('teacher.virtual-classes.destroy');

    Route::get('/teacher/assignment', [AssignmentController::class, 'index'])->name('teacher.assignment.dashboard');
    Route::post('/teacher/assignments', [AssignmentController::class, 'store'])->name('teacher.assignments.store');
    Route::delete('/teacher/assignments/destroy', [AssignmentController::class, 'destroy'])->name('teacher.assignments.destroy');


    Route::get('/teacher/submission', [SubmissionController::class, 'index'])->name('teacher.submission.dashboard');
    Route::get('/submissions/download/{id}', [SubmissionController::class, 'download'])->name('submissions.download');

    Route::get('/teacher/quiz', [QuizController::class, 'index'])->name('teacher.quiz.index');
    Route::post('/teacher/quiz/store', [QuizController::class, 'store'])->name('teacher.quiz.store');
    Route::delete('/teacher/quiz/{id}', [QuizController::class, 'destroy'])->name('teacher.quiz.destroy');


    Route::get('/teacher/feedback', [TeacherFeedbackController::class, 'index'])->name('teacher.feedback.index');
    Route::get('/teacher/feedback/show', [AspirationController::class, 'show'])->name('teacher.feedback.show');
    Route::delete('/teacher/feedback/{aspirasi}', [AspirationController::class, 'destroyaspirasi'])->name('teacher.aspirasi.destroy');
    Route::post('/teacher/feedback/store', [TeacherFeedbackController::class, 'store'])->name('teacher.feedback.store');
    Route::delete('/teacher/feedback/{id}', [TeacherFeedbackController::class, 'destroy'])->name('teacher.feedback.destroy');

    Route::get('/teacher/review', [TeacherController::class, 'review'])->name('teacher.review');
    Route::get('/teacher/review/{id}', [TeacherController::class, 'reviewDetail'])->name('teacher.review.detail');


});

Route::group(['middleware' => 'student'], function () {
    Route::get('/student', [Controller::class, 'showStudentDashboard'])->name('student.dashboard');

    Route::get('/student/learning-content', [LearningContentController::class, 'UserLearning'])->name('student.learning-content');
    Route::get('/content/download/{id}', [LearningContentController::class, 'downloadFile'])->name('user.content.download');

    Route::get('/student/quiz', [QuizController::class, 'studentQuiz'])->name('student.quiz.index');

    Route::get('/student/assignment', [AssignmentController::class, 'StudentHomework'])->name('student.assignment.dashboard');
    Route::get('/student/submision', [SubmissionController::class, 'userIndexHomeworks'])->name('student.submision.dashboard');
    Route::post('/student/submision/store', [SubmissionController::class, 'submitAssignment'])->name('student.submit.assignment');
    Route::post('/student/submit-assignment', [SubmissionController::class, 'submitAssignment'])->name('student.submit.assignment');

    Route::get('/student/feedback', [TeacherFeedbackController::class, 'showFeedback'])->name('student.feedback');

    Route::get('/student/aspiration/create', [AspirationController::class, 'create'])->name('student.aspiration.create');
    Route::post('/student/aspiration', [AspirationController::class, 'store'])->name('student.aspiration.store');


    Route::get('/student/profile/update', [StudentController::class, 'editProfile'])->name('student.profile.update');
    Route::post('/student/profile/update', [StudentController::class, 'updateProfile'])->name('student.profile.update.submit');
    Route::get('/student/about-us', [StudentController::class, 'aboutUs'])->name('student.aboutUs');
    Route::get('/student/contact', [StudentController::class, 'contact'])->name('student.Contact');

    Route::get('/likert/create', [LikertScaleController::class, 'create'])->name('likert.create');
    Route::post('/likert/store', [LikertScaleController::class, 'store'])->name('likert.store');

    
});
    

  



