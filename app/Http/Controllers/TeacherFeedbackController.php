<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\TeacherFeedback;

class TeacherFeedbackController extends Controller
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
        $subjects = Subject::all();
        $feedbacks = TeacherFeedback::with(['subject', 'classroom'])->get();
        return view('teacher.Pages.Feedback', compact('classrooms', 'subjects', 'feedbacks', 'teacher'));
    }
    
    public function showFeedback()
    {

        $feedbacks = TeacherFeedback::with('subject', 'classroom')->get(); 

        return view('student.Pages.Aspirations', compact('feedbacks',));
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
        // Validate the request
        $request->validate([
            'mata_pelajaran' => 'required|exists:subjects,id',
            'kelas_id' => 'required|exists:classrooms,id',
            'judul_feedback' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
        ]);

        // Create a new feedback entry
        TeacherFeedback::create([
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas_id' => $request->kelas_id,
            'judul_feedback' => $request->judul_feedback,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
        ]);

        // Redirect back with a success message
        return redirect()->route('teacher.feedback.index')->with('feedbackMessage', 'Feedback Berahasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherFeedback  $teacherFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherFeedback $teacherFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherFeedback  $teacherFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherFeedback $teacherFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherFeedback  $teacherFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherFeedback $teacherFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherFeedback  $teacherFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedback = TeacherFeedback::findOrFail($id);

        $feedback->delete();

        return redirect()->route('teacher.feedback.index')->with('feedbackMessage', 'Feedback berhasil dihapus.');
    }
}
