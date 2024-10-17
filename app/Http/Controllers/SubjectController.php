<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Imports\SubjectsImport;
use Maatwebsite\Excel\Facades\Excel;

class SubjectController extends Controller
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
    public function createSubject()
    {
        $mapels = Subject::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.create_subject', compact('mapels'));
    }

    public function importSubject()
    {
        $mapels = Subject::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.import_subject', compact('mapels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubjectsData(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nama_mapel' => 'required|string|max:100', // Validasi untuk nama_mapel
            'kode_mapel' => 'required|string|max:20|unique:subjects,kode_mapel', // Validasi untuk kode_mapel
        ]);

        // Simpan data mata pelajaran ke dalam database
        Subject::create([
            'nama_mapel' => $request->nama_mapel,
            'kode_mapel' => $request->kode_mapel, // Menyimpan kode_mapel juga
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('subjectImportSuccess', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function importSubjectsData(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new SubjectsImport, $request->file('file'));

        return redirect()->back()->with('subjectImportSuccess', 'Data Mapel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Subject::findOrFail($id);
        $mapel->delete();

        return redirect()->back()->with('subjectDestroySuccess', 'Mata pelajaran berhasil dihapus!');
    }
}
