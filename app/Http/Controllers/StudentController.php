<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Models\Classroom;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('student.Pages.Accout_Profile');
    }
    public function aboutUs()
    {
        return view('student.Pages.About_us');
    }
    public function contact()
    {
        return view('student.Pages.Contact');
    }

    public function updateProfile(Request $request)
 {
    // Get the authenticated student
    $student = auth()->guard('student')->user();

    // Validate the input
    $request->validate([
        'username' => 'required|string|max:50|unique:students,username,' . $student->id,
        'nama' => 'required|string|max:100',
        'email' => 'nullable|email',
        'jenis_kelamin' => 'required|in:L,P', // Assuming 'L' for Male and 'P' for Female
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'agama' => 'required|string|max:50',
        'foto_profil' => 'nullable|image|max:2048', // max 2MB
    ]);

    // Check if a new profile photo is uploaded
    if ($request->hasFile('foto_profil')) {
        // Delete the old photo if it exists
        if ($student->foto_profil) {
            Storage::disk('public')->delete($student->foto_profil);
        }

        // Store the new photo and save the path
        $path = $request->file('foto_profil')->store('student_profile', 'public');
        $student->foto_profil = $path;
    }

    // Update the student's data
    $student->update($request->only([
        'username', 'nama', 'email', 'jenis_kelamin', 
        'tempat_lahir', 'tanggal_lahir', 'alamat', 'agama'
    ]));

    return redirect()->route('student.profile.update')->with('success', 'Profile updated successfully.');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStudent()
    {

        $students = Student::orderBy('created_at', 'desc')->get();
        $classrooms = Classroom::all();
        return view('administrator.Pages.create_student', compact('students', 'classrooms'));
    }

    public function importStudent()
    {
         $students = Student::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.import_student', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudentsData(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'nisn' => 'required|string|max:20|unique:students',
            'nis_sekolah' => 'required|string|max:20|unique:students',
            'nama' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:students',
            'email' => 'nullable|email',
            'kelas' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'password' => 'required|string|min:6',
            'agama' => 'required|string|max:50',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload for foto_profil
        $imagePath = null;
        if ($request->hasFile('foto_profil')) {
            $imagePath = $request->file('foto_profil')->store('student_profile', 'public');
        }

        // Create the new student
        Student::create([
            'nisn' => $request->input('nisn'),
            'nis_sekolah' => $request->input('nis_sekolah'),
            'nama' => $request->input('nama'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'kelas' => $request->input('kelas'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'password' => bcrypt($request->input('password')), // Hash the password
            'agama' => $request->input('agama'),
            'foto_profil' => $imagePath,
        ]);

        // Redirect back with success message
      return redirect()->back()->with('studentCreatedSuccess', 'Data Siswa Berhasil Ditambahkan!.');
    }
    
    public function importStudentsData(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()->with('studentImportSuccess', 'Data Siswa Berhasil Ditambahkan!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->foto_profil) {
            Storage::disk('public')->delete($student->foto_profil);
        }

        $student->delete();

        return redirect()->back()->with('studentDeleteSuccess', 'Siswa berhasil dihapus!');
    }

}
