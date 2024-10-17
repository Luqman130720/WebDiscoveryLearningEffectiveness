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
                                        data-bs-toggle="modal" data-bs-target="#inputDataKelas"> <!-- ID diperbaiki -->
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Data Kelas</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Operator Account -->

        <!-- View Data Kelas-->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Kelas</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Kelas</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Wali Kelas</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classrooms as $key => $classroom)
                                            <tr>
                                                <td>
                                                    <p class="text-xs text-center font-weight-bold mb-0">
                                                        {{ $key + 1 }}</p>
                                                </td>
                                                <td class="text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $classroom->nama_kelas }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        {{ $classroom->nama_walikelas }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('operator.classroom.destroy', $classroom->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-round bg-gradient-info btn-xs w-100 mt-2 font-weight-bold text-xs ms-2"
                                                            data-toggle="tooltip" data-original-title="Delete user"
                                                            onclick="return confirm('Are you sure you want to delete this user?');">Delete</i>
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
            @include('administrator.Components.Footer')
        </div>
        <!-- View Data Kelas-->

        <!-- Modal Input Data Kelas -->
        <div class="modal fade" id="inputDataKelas" tabindex="-1" role="dialog" aria-labelledby="inputDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputDataModalLabel">Masukkan Data Kelas</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formInputDataKelas" action="{{ route('operator.classroom.create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kelas">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" maxlength="50"
                                    placeholder="Masukkan nama kelas" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_walikelas">Nama Wali Kelas</label>
                                <input type="text" class="form-control" id="nama_walikelas" name="nama_walikelas"
                                    maxlength="100" placeholder="Masukkan nama wali kelas" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-warning"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-round bg-gradient-info" form="formInputDataKelas">Simpan
                            Data</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Input Data Kelas -->

        <!-- Alert Notification for Teacher Actions -->
        <script>
            window.onload = function() {

                @if (session('classroomImportSuccess'))
                    var importNotificationModal = new bootstrap.Modal(document.getElementById('classroomImportSuccess'));
                    importNotificationModal.show();
                @endif

                @if (session('classroomDestroySuccess'))
                    var deleteNotificationModal = new bootstrap.Modal(document.getElementById('classroomDestroySuccess'));
                    deleteNotificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification Data Guru Berhasil Ditambahkan -->
        <div class="modal fade" id="classroomImportSuccess" tabindex="-1" role="dialog"
            aria-labelledby="classroomImportSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="classroomImportSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('classroomImportSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Guru Berhasil Ditambahkan -->

        <!-- Modal Notification Data Guru Berhasil Dihapus -->
        <div class="modal fade" id="classroomDestroySuccess" tabindex="-1" role="dialog"
            aria-labelledby="classroomDestroySuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="classroomDestroySuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('classroomDestroySuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Guru Berhasil Dihapus -->





    </div>
@endsection
