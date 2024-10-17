@extends('Administrator.Components.Layout')
@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">

        <!-- Header Operator Account -->
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets/admin/img/team-1.jpg') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Sayo Kravits
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Public Relations
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#inputDataSoal"> <!-- ID diperbaiki -->
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Soal</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Operator Account -->

        <!-- View Data Soal -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Soal</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                                style="width: 50px;">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Soal</th>
                                            <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7"
                                                style="width: 220px;">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $key => $question)
                                            <tr>
                                                <td class="text-left">
                                                    <p class="text-xs font-weight-bold mb-0 ps-4" style="width: 50px;">
                                                        {{ $key + 1 }}</p>
                                                </td>
                                                <td class="text-left">
                                                    <p class="text-xs font-weight-bold mb-0 ps-3">
                                                        {{ $question->question_text }}
                                                    </p>
                                                </td>
                                                <td class="text-center" style="width: 220px;">
                                                    <form action="{{ route('questions.destroy', $question->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-xs w-50"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?');">Hapus</button>
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
        </div>
        @include('administrator.Components.Footer')



        <!-- Modal Input Soal -->
        <div class="modal fade" id="inputDataSoal" tabindex="-1" role="dialog" aria-labelledby="inputDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputDataModalLabel">Masukkan Soal</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formInputSoal" action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question_text">Soal</label>
                                <input type="text" name="question_text" id="question_text" class="form-control" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-warning"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-round bg-gradient-info" form="formInputSoal">Simpan
                            Soal</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Notification Soal Berhasil Ditambahkan -->
        <div class="modal fade" id="questionImportSuccess" tabindex="-1" role="dialog"
            aria-labelledby="questionImportSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="questionImportSuccessLabel">Success</h6>
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
        <!-- End Modal Notification Soal Berhasil Ditambahkan -->

        <script>
            window.onload = function() {
                @if (session('success'))
                    var notificationModal = new bootstrap.Modal(document.getElementById('questionImportSuccess'));
                    notificationModal.show();
                @endif
            };
        </script>

        <!-- Modal Notification Soal Berhasil Ditambahkan -->
        <div class="modal fade" id="questionImportSuccess" tabindex="-1" role="dialog"
            aria-labelledby="questionImportSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="questionImportSuccessLabel">Success</h6>
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
        <!-- End Modal Notification Soal Berhasil Ditambahkan -->

        <script>
            window.onload = function() {
                @if (session('success'))
                    var notificationModal = new bootstrap.Modal(document.getElementById('questionImportSuccess'));
                    notificationModal.show();
                @endif
            };
        </script>








    </div>
@endsection
