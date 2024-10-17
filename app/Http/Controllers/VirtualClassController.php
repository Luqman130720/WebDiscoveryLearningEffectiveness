<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\VirtualClass;
use Illuminate\Http\Request;

class VirtualClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = auth()->guard('teacher')->user();
        $kelasVirtual = VirtualClass::all();
        $classrooms = Classroom::all();
        return view('Teacher.Pages.Virtual_Classes', compact('kelasVirtual','classrooms', 'teacher'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'agenda' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'link_kelas_virtual' => 'required|url',
        ]);

        // Create a new VirtualClass record
        VirtualClass::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Kelas virtual berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VirtualClass  $virtualClass
     * @return \Illuminate\Http\Response
     */
    public function show(VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VirtualClass  $virtualClass
     * @return \Illuminate\Http\Response
     */
    public function edit(VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VirtualClass  $virtualClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VirtualClass $virtualClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VirtualClass  $virtualClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(VirtualClass $virtualClass, $id)
    {
        // Find the class by ID and delete it
        $class = VirtualClass::findOrFail($id);
        $class->delete();

        // Redirect back with a success message
        return redirect()->route('teacher.virtual-classes')->with('success', 'Kelas virtual berhasil dihapus.');
    }

}
