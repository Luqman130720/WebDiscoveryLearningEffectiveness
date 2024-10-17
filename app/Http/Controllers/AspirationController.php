<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;

class AspirationController extends Controller
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
        return view('student.Pages.Create_Aspirasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validasi input
            $request->validate([
                'judul_aspirasi' => 'required|string|max:255',
                'isi_aspirasi' => 'required|string',
            ]);

            // Simpan data aspirasi
            Aspiration::create([
                'judul_aspirasi' => $request->judul_aspirasi,
                'isi_aspirasi' => $request->isi_aspirasi,
                // Tambahkan data lain yang perlu disimpan
            ]);

            return redirect()->route('student.aspiration.create')->with('success', 'Aspirasi berhasil dikirim!');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
    public function show(Aspiration $aspiration)
    {
        $teacher = auth()->guard('teacher')->user();
        $feedbacks = Aspiration::all();
        return view('teacher.Pages.Feedback_show', compact('feedbacks', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspiration $aspiration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspiration $aspiration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aspiration  $aspiration
     * @return \Illuminate\Http\Response
     */
    public function destroyaspirasi($id)
    {
        // Temukan aspirasi berdasarkan ID
        $aspiration = Aspiration::findOrFail($id);

        // Hapus aspirasi
        $aspiration->delete();

        // Kembali ke halaman feedback dengan pesan sukses
        return redirect()->route('teacher.feedback.show')->with('success', 'Aspirasi berhasil dihapus!');
    }
}
