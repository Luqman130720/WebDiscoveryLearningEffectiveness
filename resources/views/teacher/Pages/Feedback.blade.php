@extends('teacher.Components.Layout')
@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">

        <!-- Header Operator Account -->
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
                    <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#inputDataKelas"> <!-- ID diperbaiki -->
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Data Feedback</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Operator Account -->

        <!-- View Data Feedback-->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Feedback</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Judul Feedback</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbacks as $key => $feedback)
                                            <tr>
                                                <td class="">{{ $key + 1 }}</td>
                                                <td class="">{{ $feedback->subject->nama_mapel }}</td>
                                                <td class="">{{ $feedback->classroom->nama_kelas }}</td>
                                                <td class="">{{ $feedback->judul_feedback }}</td>
                                                <td class="">{{ $feedback->tanggal }}</td>
                                                <td class="">{{ $feedback->waktu }}</td>
                                                <td class="">
                                                    <form action="{{ route('teacher.feedback.destroy', $feedback->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs"
                                                            onclick="return confirm('Are you sure you want to delete this feedback?');">Delete</button>
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
            @include('administrator.Components.Footer')
        </div>
        <!-- View Data Feedback-->

        <!-- Modal Input Data Feedback -->
        <div class="modal fade" id="inputDataKelas" tabindex="-1" role="dialog" aria-labelledby="inputDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputDataModalLabel">Masukkan Data Kelas</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('teacher.feedback.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="mata_pelajaran" class="form-label">Pilih Mata Pelajaran</label>
                                <select name="mata_pelajaran" id="mata_pelajaran" class="form-control" required>
                                    <option value="">-- Pilih Mata Pelajaran --</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="judul_feedback" class="form-label">Judul Feedback</label>
                                <input type="text" class="form-control" id="judul_feedback" name="judul_feedback"
                                    required>
                            </div>

                            <select class="form-control" id="kelas" name="kelas_id" required
                                aria-describedby="kelasHelp">
                                <option value="">Pilih Kelas</option>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                                @endforeach
                            </select>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>

                            <div class="mb-3">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="waktu" name="waktu" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-round bg-gradient-warning"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-round bg-gradient-info">Simpan
                                    Data</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Input Data Feedback -->

        <script>
            window.onload = function() {
                @if (session('feedbackMessage'))
                    var actionNotificationModal = new bootstrap.Modal(document.getElementById('feedbackActionSuccess'));
                    actionNotificationModal.show();
                @endif
            };
        </script>


        <!-- Modal Notification Feedback Action -->
        <div class="modal fade" id="feedbackActionSuccess" tabindex="-1" role="dialog"
            aria-labelledby="feedbackActionSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="feedbackActionSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p id="feedbackMessage">{{ session('feedbackMessage') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Feedback Action -->




    </div>
@endsection
