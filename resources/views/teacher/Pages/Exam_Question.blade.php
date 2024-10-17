@extends('Teacher.Components.Layout')

@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ $teacher->foto_profil ? asset('storage/' . $teacher->foto_profil) : asset('assets/admin/img/default-avatar.jpg') }}"
                                alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $teacher->nama }} <!-- Display Teacher's Name -->
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ $teacher->email }} <!-- Display Teacher's Email -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <h4>Tambah Soal Ujian</h4>

            <!-- Form untuk Menambahkan Soal -->
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 m-4">
                    <form action="{{ route('teacher.soal.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="question_text" class="form-label">Soal</label>
                            <input type="text" class="form-control" id="question_text" name="text" required
                                placeholder="Masukkan teks soal">
                        </div>
                        <div class="mb-3">
                            <label for="option_a" class="form-label">Pilihan A</label>
                            <input type="text" class="form-control" id="option_a" name="options[a]" required
                                placeholder="Masukkan pilihan A">
                        </div>
                        <div class="mb-3">
                            <label for="option_b" class="form-label">Pilihan B</label>
                            <input type="text" class="form-control" id="option_b" name="options[b]" required
                                placeholder="Masukkan pilihan B">
                        </div>
                        <div class="mb-3">
                            <label for="option_c" class="form-label">Pilihan C</label>
                            <input type="text" class="form-control" id="option_c" name="options[c]" required
                                placeholder="Masukkan pilihan C">
                        </div>
                        <div class="mb-3">
                            <label for="option_d" class="form-label">Pilihan D</label>
                            <input type="text" class="form-control" id="option_d" name="options[d]" required
                                placeholder="Masukkan pilihan D">
                        </div>
                        <div class="mb-3">
                            <label for="correct_option" class="form-label">Pilihan yang benar</label>
                            <select class="form-select" id="correct_option" name="correct_option" required>
                                <option value="">Pilih jawaban yang benar</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="question_image" class="form-label">Gambar (Opsional)</label>
                            <input type="file" class="form-control" id="question_image" name="image" accept="image/*">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100">Simpan Soal</button>
                        </div>
                    </form>
                </div>
            </div>

            @include('teacher.Components.Footer')
        </div>
    </div>
@endsection
