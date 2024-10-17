<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = auth()->guard('teacher')->user();
        $assignments = Assignment::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('Teacher.Pages.Assignment',compact('classrooms', 'assignments', 'subjects', 'teacher'));
    }

    public function StudentHomework()
    {
        $assignments = Assignment::all();
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('student.Pages.Homework',compact('classrooms', 'assignments', 'subjects'));
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
        // Validasi input
        $validatedData = $request->validate([
            'guru_pembuat' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'judul_tugas' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'tanggal_pengerjaan' => 'required|date',
            'waktu_pengerjaan' => 'required|date_format:H:i', // Validasi waktu
            'tanggal_pengumpulan' => 'required|date',
            'waktu_pengumpulan' => 'required|date_format:H:i', // Validasi waktu
            'link_file' => 'nullable|url',
            'unggah_soal' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Max size 2MB
            'deskripsi' => 'nullable|string',
        ]);

        try {
            // Proses upload file soal
            if ($request->hasFile('unggah_soal')) {
                // Mengambil nama asli file
                $originalFileName = $request->file('unggah_soal')->getClientOriginalName();
                // Menyimpan file dengan nama unik di folder 'Uploads/Tugas'
                $filePath = $request->file('unggah_soal')->storeAs('file-tugas', $originalFileName, 'public');
                $validatedData['unggah_soal'] = $filePath; // Menyimpan path ke validasi data
            }

            // Simpan data ke database
            Assignment::create($validatedData);

            // Set flash message
            return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan tugas: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request)
    {
        // Validasi bahwa ID tugas ada
        $request->validate([
            'id' => 'required|exists:assignments,id', // Pastikan tugas ada di database
        ]);

        try {
            // Mencari tugas berdasarkan ID
            $assignment = Assignment::find($request->input('id'));

            if ($assignment) {
                // Hapus file unggah soal jika ada
                if ($assignment->unggah_soal) {
                    Storage::disk('public')->delete($assignment->unggah_soal);
                }

                // Hapus tugas dari database
                $assignment->delete();

                // Set flash message
                return redirect()->back()->with('deleteSuccess', 'Tugas berhasil dihapus!');
            }

            return redirect()->back()->with('error', 'Tugas tidak ditemukan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus tugas: ' . $e->getMessage());
        }
    }
}
