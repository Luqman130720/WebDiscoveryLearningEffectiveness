<?php

namespace App\Http\Controllers;

use App\Imports\ClassroomsImport;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClassroomController extends Controller
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
    public function createClassroom()
    {
        $classrooms = Classroom::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.create_classroom', compact('classrooms'));
    }

    public function importClassroom()
    {
         $classrooms = Classroom::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.import_classroom', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeClassroomsData(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:50',
            'nama_walikelas' => 'required|string|max:100',
        ]);

        Classroom::create([
            'nama_kelas' => $request->input('nama_kelas'),
            'nama_walikelas' => $request->input('nama_walikelas'),
        ]);

        return redirect()->back()->with('classroomImportSuccess', 'Data Kelas Berhasil Ditambahkan!');
    }

    public function importClassroomsData(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new ClassroomsImport, $request->file('file'));

        return redirect()->back()->with('classroomImportSuccess', 'Data Kelas Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, $id)
    {
        $classroom = Classroom::find($id);

        $classroom->delete();
       return redirect()->back()->with('classroomDestroySuccess', 'Data Kelas Berhasil Dihapus!');
    }
}
