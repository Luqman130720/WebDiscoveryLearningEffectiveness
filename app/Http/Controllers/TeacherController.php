<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\LikertScale;
use Illuminate\Http\Request;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
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

    public function review()
    {
        $teacher = auth()->guard('teacher')->user();
        $likertScales = LikertScale::select('nisn', 'name', 'class')
            ->groupBy('nisn', 'name', 'class')
            ->get();
        return view('teacher.Pages.Scale_Review', compact('likertScales', 'teacher'));
    }

    public function reviewDetail($nisn)
    {
        $likertScales = LikertScale::with('question')->where('nisn', $nisn)->get();
        $teacher = auth()->guard('teacher')->user();
        return view('teacher.Pages.Scale_Detail', compact('likertScales', 'teacher'));
    }



        public function showProfile()
    {
        if (auth('teacher')->check()) { // Use the 'teacher' guard
            $teacher = auth('teacher')->user(); // Get the authenticated teacher
            return view('teacher.Pages.Profile_Account', compact('teacher'));
        }
    }

    public function updateProfile(Request $request)
    {
        // Fetch the authenticated teacher
        $teacher = auth()->guard('teacher')->user();

        // Validate the input fields
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:teachers,username,' . $teacher->id,
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:50',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        // Handle file upload for 'foto_profil'
        if ($request->hasFile('foto_profil')) {
            // Delete old photo if it exists
            if ($teacher->foto_profil) {
                Storage::disk('public')->delete($teacher->foto_profil);
            }

            // Store new photo and update the path
            $path = $request->file('foto_profil')->store('teacher_profile', 'public');
            $validated['foto_profil'] = $path;
        }

        // Update the teacher's data with validated inputs
        $teacher->update($validated);

        // Redirect back to the profile page with a success message
        return redirect()->route('teacher.profile')->with('success', 'Profile updated successfully.');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTeacher()
    {
         $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.create_teacher', compact('teachers'));
    }

    public function importTeacher()
    {
         $teachers = Teacher::orderBy('created_at', 'desc')->get();
        return view('administrator.Pages.import_teacher', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTeachersData(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|string|max:20|unique:teachers,nip',
            'username' => 'required|string|max:50|unique:teachers,username',
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'password' => 'required|string|min:6',
            'agama' => 'required|string|max:50',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('foto_profil')) {
            $imagePath = $request->file('foto_profil')->store('teacher_profile', 'public');
        }

        $validatedData['password'] = bcrypt($validatedData['password']);

        if ($imagePath) {
            $validatedData['foto_profil'] = $imagePath;
        }

        Teacher::create($validatedData);

       
       return redirect()->back()->with('teacherInputSuccess', 'Data guru berhasil ditambahkan.');
    }
    // 

    public function importTeachersData(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new TeachersImport, $request->file('file'));

        return redirect()->back()->with('teacherImportSuccess', 'Data guru berhasil diimpor.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher, $id)
    {
        
        $teacher = Teacher::findOrFail($id);
        if ($teacher->foto_profil) {
            Storage::disk('public')->delete($teacher->foto_profil);
        }
        $teacher->delete();

        return redirect()->back()->with('teacherDeleteSuccess', 'Data guru berhasil dihapus.');
    }
}
