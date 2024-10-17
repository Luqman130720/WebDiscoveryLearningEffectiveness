<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\LearningContent;

class LearningContentController extends Controller
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
        return view('Teacher.Pages.Learning_Content',compact('classrooms', 'teacher'));
    }

    public function UserLearning()
    {
        $learningContents = LearningContent::all();
        return view('student.Pages.Learning',compact('learningContents'));
    }
    
    public function contentCatalog()
    {
        $teacher = auth()->guard('teacher')->user();
        $learningContents = LearningContent::all(); 
        return view('Teacher.Pages.Content_Catalog', compact('learningContents', 'teacher'));
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
        $request->validate([
            'judul_konten' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'file_konten' => 'required|file|mimes:pdf|max:2048',
            'kelas' => 'required|exists:classrooms,id',
        ]);

        try {
            // Mengambil nama asli file
            $originalFileName = $request->file('file_konten')->getClientOriginalName();

            // Menyimpan file dengan nama unik
            $fileKontenPath = $request->file('file_konten')->storeAs('files', $originalFileName, 'public');

            // Menyimpan cover image
            $coverPath = $request->file('cover')->store('covers', 'public');

            // Membuat konten pembelajaran baru
            LearningContent::create([
                'judul_konten' => $request->input('judul_konten'),
                'pengarang' => $request->input('pengarang'),
                'penerbit' => $request->input('penerbit'),
                'deskripsi' => $request->input('deskripsi'),
                'cover' => $coverPath,
                'file_konten' => $fileKontenPath, // Simpan jalur PDF
                'kelas' => $request->input('kelas'),
            ]);

            // Alihkan dengan pesan sukses
            return redirect()->route('teacher.learning-content')->with('success', 'Konten berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan konten: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LearningContent  $learningContent
     * @return \Illuminate\Http\Response
     */

    public function show(LearningContent $learningContent, $id)
    {
        // Retrieve content by its ID
        $content = LearningContent::findOrFail($id);

        // Return the view with the content data
        return view('Teacher.Pages.Learning_Detail', compact('content'));
    }

    public function downloadFile($id)
    {
        $content = LearningContent::find($id); // Ambil konten berdasarkan ID

        // Dapatkan jalur file
        $filePath = storage_path('app/public/' . $content->file_konten);

        // Ambil nama asli file dari kolom 'file_konten'
        $originalFileName = pathinfo($content->file_konten, PATHINFO_BASENAME); // Menggunakan basename untuk mendapatkan nama file asli

        // Kembalikan file untuk diunduh dengan nama asli
        return response()->download($filePath, $originalFileName);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LearningContent  $learningContent
     * @return \Illuminate\Http\Response
     */
    public function edit(LearningContent $learningContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LearningContent  $learningContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearningContent $learningContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearningContent  $learningContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = LearningContent::find($id);

        if (!$content) {
            return redirect()->back()->with('error', 'Konten tidak ditemukan.');
        }

        // Hapus file jika diperlukan
        if (file_exists(storage_path('app/public/' . $content->file_konten))) {
            unlink(storage_path('app/public/' . $content->file_konten));
        }

        // Hapus konten dari database
        $content->delete();

        return redirect()->route('teacher.content.catalog')->with('success_delete', 'Konten berhasil dihapus.');
    }

}
