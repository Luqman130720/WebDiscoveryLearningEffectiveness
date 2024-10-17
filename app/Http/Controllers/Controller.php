<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showStudentDashboard()
    {
        return view('student.Pages.Dashboard');
    }
    public function portal()
    {
        return view('login.Portal');
    }

    public function showTeacherDashboard()
    {
        $teacher = auth()->guard('teacher')->user();
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalSubjects = Subject::count();
        $totalClassroom = Classroom::count();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();

        return view('teacher.Pages.Dashboard', [
            'teacher' => $teacher, // Include teacher here
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'totalSubjects' => $totalSubjects,
            'totalClassroom' => $totalClassroom,
            'classrooms' => $classrooms,
            'teachers' => $teachers,
        ]);
    }


    public function showOperatorDashboard()
    {
        $totalTeachers = Teacher::count();
        $totalStudents = Student::count();
        $totalSubjects = Subject::count();
        $totalClassroom = Classroom::count();
        $classrooms = Classroom::all();
        $teachers = Teacher::all();

        return view('administrator.Pages.Dashboard', [
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'totalSubjects' => $totalSubjects,
            'totalClassroom' => $totalClassroom,
            'classrooms' => $classrooms,
            'teachers' => $teachers,
        ]);
    }
}
