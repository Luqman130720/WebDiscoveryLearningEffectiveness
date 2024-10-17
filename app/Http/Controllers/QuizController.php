<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = auth()->guard('teacher')->user();
        $classrooms = Classroom::all();
        $quizzes = Quiz::all();
        $subjects = Subject::all();
        return view('Teacher.Pages.Quiz', compact('classrooms', 'quizzes', 'subjects', 'teacher'));
    }

    public function studentQuiz()
    {
        $classrooms = Classroom::all();
        $quizzes = Quiz::all();
        $subjects = Subject::all();
        return view('student.Pages.Quizz', compact('classrooms', 'quizzes', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'guru_pembuat' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'judul_kuis' => 'required|string|max:255',
            'kelas_id' => 'required|exists:classrooms,id',
            'tanggal_pengerjaan' => 'required|date',
            'waktu_pengerjaan' => 'required|date_format:H:i',
            'link_kuis' => 'required|url',
            'deskripsi' => 'nullable|string',
        ]);
        //  dd($validatedData);

        Quiz::create($validatedData); 

        return redirect()->route('teacher.quiz.index')->with('success', 'Kuis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $quiz = Quiz::find($id);

        if (!$quiz) {
            return redirect()->route('teacher.quiz.index')->with('error', 'Kuis tidak ditemukan.');
        }

        try {
            $quiz->delete();

            return redirect()->route('teacher.quiz.index')->with('success', 'Kuis berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('teacher.quiz.index')->with('error', 'Gagal menghapus kuis: ' . $e->getMessage());
        }
    }


}
