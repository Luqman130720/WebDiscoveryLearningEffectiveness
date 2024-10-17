<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\LikertScale;
use Illuminate\Http\Request;

class LikertScaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = auth()->guard('student')->user();
        $questions = Question::all(); 
        return view('student.Pages.Likert_Create',compact('student', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required',
            'name' => 'required',
            'class' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'scale' => 'required|array',
            'scale.*' => 'required|integer|min:1|max:5', // Validasi nilai skala antara 1 dan 5
        ]);

        // Iterasi setiap skala yang diterima dan simpan ke database
        foreach ($validated['scale'] as $questionId => $scaleValue) {
            LikertScale::create([
                'nisn' => $validated['nisn'],
                'name' => $validated['name'],
                'class' => $validated['class'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'question_id' => $questionId, // Menyimpan ID pertanyaan
                'scale' => $scaleValue, // Menyimpan nilai skala
            ]);
        }

        return redirect()->back()->with('success', 'Skala Likert berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LikertScale  $likertScale
     * @return \Illuminate\Http\Response
     */
    public function show(LikertScale $likertScale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LikertScale  $likertScale
     * @return \Illuminate\Http\Response
     */
    public function edit(LikertScale $likertScale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LikertScale  $likertScale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LikertScale $likertScale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LikertScale  $likertScale
     * @return \Illuminate\Http\Response
     */
    public function destroy(LikertScale $likertScale)
    {
        //
    }
}
