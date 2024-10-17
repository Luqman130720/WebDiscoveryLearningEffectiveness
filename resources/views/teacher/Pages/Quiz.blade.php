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
                    <div class="col-lg-2 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modal-add-tugas">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Quiz</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Notification for User Actions -->
        <script>
            window.onload = function() {
                @if (session('success'))
                    var notificationModal = new bootstrap.Modal(document.getElementById('actionSuccessModal'));
                    notificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification for Actions (Create and Delete) -->
        <div class="modal fade" id="actionSuccessModal" tabindex="-1" role="dialog"
            aria-labelledby="actionSuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="actionSuccessModalLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal Notification for Actions -->




        <!-- Modal Tambah Tugas -->
        <div class="modal fade" id="modal-add-tugas" tabindex="-1" role="dialog" aria-labelledby="modal-add-tugas"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah Quiz</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('teacher.quiz.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Mulai Mengerjakan Tugas -->
                                    <div class="mb-3">
                                        <h6 class="text-info">Form Pembuatan Quiz</h6>
                                    </div>

                                    <!-- Guru Pembuat -->
                                    <div class="mb-3">
                                        <label for="guru_pembuat" class="form-label">Guru Pembuat</label>
                                        <input type="text" class="form-control" id="guru_pembuat" name="guru_pembuat"
                                            required placeholder="Masukkan nama guru pembuat">
                                    </div>

                                    <!-- Mata Pelajaran -->
                                    <div class="mb-3">
                                        <label for="mata_pelajaran" class="form-label">Pilih Mata Pelajaran</label>
                                        <select name="mata_pelajaran" id="mata_pelajaran" class="form-control" required>
                                            <option value="">-- Pilih Mata Pelajaran --</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->nama_mapel }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Judul Tugas -->
                                    <div class="mb-3">
                                        <label for="judul_kuis" class="form-label">Judul Kuis</label>
                                        <input type="text" class="form-control" id="judul_kuis" name="judul_kuis"
                                            required placeholder="Masukkan judul kuis">
                                    </div>

                                    <!-- Kelas -->
                                    <select class="form-control" id="kelas" name="kelas_id" required
                                        aria-describedby="kelasHelp">
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                                        @endforeach
                                    </select>


                                    <!-- Tanggal Pengerjaan -->
                                    <div class="mb-3">
                                        <label for="tanggal_pengerjaan" class="form-label">Tanggal Pengerjaan</label>
                                        <input type="date" class="form-control" id="tanggal_pengerjaan"
                                            name="tanggal_pengerjaan" required>
                                    </div>

                                    <!-- Waktu Pengerjaan -->
                                    <div class="mb-3">
                                        <label for="waktu_pengerjaan" class="form-label">Waktu Pengerjaan</label>
                                        <input type="time" class="form-control" id="waktu_pengerjaan"
                                            name="waktu_pengerjaan" required>
                                    </div>

                                    <!-- Link Kuis -->
                                    <div class="mb-3">
                                        <label for="link_kuis" class="form-label">Link Kuis</label>
                                        <input type="url" class="form-control" id="link_kuis" name="link_kuis"
                                            required placeholder="Masukkan link kuis" aria-describedby="linkKuisHelp">
                                        <div id="linkKuisHelp" class="form-text">Masukkan link kuis, wajib diisi.</div>
                                    </div>


                                    <!-- Deskripsi -->
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" type="text" name="deskripsi" rows="3"
                                            placeholder="Masukkan deskripsi tugas (boleh kosong)"></textarea>
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambah
                                            Kuis</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Tugas -->




        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ms-2">
                                                No</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Judul Kuis</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Mata Pelajaran</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal dan Waktu</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Link Kuis</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $index => $quiz)
                                            <tr>
                                                <td class="text-center text-secondary text-xs">{{ $index + 1 }}</td>
                                                <td class="text-secondary text-xs">{{ $quiz->judul_kuis }}</td>
                                                <td class="text-secondary text-xs">{{ $quiz->nama_mapel }}</td>
                                                <td class="text-center text-secondary text-xs">
                                                    {{ \Carbon\Carbon::parse($quiz->tanggal_pengerjaan)->format('d-m-Y') }}<br>
                                                    {{ \Carbon\Carbon::parse($quiz->waktu_pengerjaan)->format('H:i') }}
                                                </td>

                                                <td class="text-center text-secondary text-xs">
                                                    <a class="btn bg-gradient-info btn-xs btn-round"
                                                        href="{{ $quiz->link_kuis }}" target="_blank"
                                                        role="button">Buka
                                                        Kuis</a>
                                                </td>
                                                <td class="text-center text-secondary text-xs">
                                                    <form action="{{ route('teacher.quiz.destroy', $quiz->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn bg-gradient-danger btn-xs btn-round" title="Hapus"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus kuis ini?')">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    </form>

                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('teacher.Components.Footer')
        </div>
    </div>
@endsection
