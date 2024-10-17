<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = auth()->guard('teacher')->user();
        $submissions = Submission::with('student', 'assignment')->get();
        return view('Teacher.Pages.Submission', compact('submissions', 'teacher'));
    }

    public function userIndexHomeworks()
    {
        $classrooms = Classroom::all();
        $assignments  = Assignment::all(); 
        return view('student.Pages.Homework_Send', compact('classrooms', 'assignments'));
    }

    public function download($id)
    {
        $submission = Submission::findOrFail($id);
        
        return Storage::download($submission->file_tugas);
    }

    public function submitAssignment(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'file_tugas' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'link_tugas' => 'nullable|url',
            'catatan' => 'nullable|string',
            'nama_siswa' => 'required|string',
            'kelas' => 'required|string',
        ]);

        // Menyimpan tugas ke dalam database
        $submission = new Submission();
        $submission->assignment_id = $request->assignment_id;
        $submission->file_tugas = $request->file('file_tugas')->store('uploads'); // Menyimpan file
        $submission->link_tugas = $request->link_tugas;
        $submission->catatan = $request->catatan;
        $submission->nama_siswa = $request->nama_siswa; // Menyimpan nama siswa
        $submission->kelas = $request->kelas; // Menyimpan kelas
        $submission->save();

        return redirect()->back()->with('success', 'Tugas berhasil dikirimkan!');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
