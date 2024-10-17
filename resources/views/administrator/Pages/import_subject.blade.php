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
                                        data-bs-toggle="modal" data-bs-target="#uploadDataModal">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Import Data Mapel</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Operator Account -->

        <!-- View Data Mapel -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Mata Pelajaran</h6>
                        </div>
                        <div class="card-body px-0 pt-0 m-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Mata Pelajaran</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mapels as $key => $mapel)
                                            <tr>
                                                <td>
                                                    <p class="text-xs text-center font-weight-bold mb-0">
                                                        {{ $key + 1 }}</p>
                                                </td>
                                                <td class=" text-sm">
                                                    <p class="text-xs font-weight-bold mb-0">{{ $mapel->nama_mapel }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <form action="{{ route('operator.subject.destroy', $mapel->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-round bg-gradient-danger btn-xs w-100 mt-2 font-weight-bold text-xs ms-2"
                                                            data-toggle="tooltip" data-original-title="Delete mapel"
                                                            onclick="return confirm('Are you sure you want to delete this mata pelajaran?');">
                                                            Delete
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
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a> for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- View Data Mapel -->

        <!-- Modal Upload Data Mapel -->
        <div class="modal fade" id="uploadDataModal" tabindex="-1" role="dialog" aria-labelledby="uploadDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadDataModalLabel">Upload Data Mapel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('operator.subject.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="file">Upload File Excel</label>
                                <input type="file" name="file" class="form-control" id="file" required
                                    accept=".xlsx, .xls">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-2">Import
                                    Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Upload Data Mapel -->


        <!-- Alert Notification Untuk Subject -->
        <script>
            window.onload = function() {
                // Check if there is a success notification for subject import
                @if (session('subjectImportSuccess'))
                    var importNotificationModal = new bootstrap.Modal(document.getElementById('subjectImportSuccess'));
                    importNotificationModal.show();
                @endif

                // Check if there is a success notification for subject delete
                @if (session('subjectDestroySuccess'))
                    var deleteNotificationModal = new bootstrap.Modal(document.getElementById('subjectDestroySuccess'));
                    deleteNotificationModal.show();
                @endif
            };
        </script>
        <!-- Alert Notification Untuk Subject -->

        <!-- Modal Notification Data Mapel Berhasil Ditambahkan -->
        <div class="modal fade" id="subjectImportSuccess" tabindex="-1" role="dialog"
            aria-labelledby="subjectImportSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="subjectImportSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('subjectImportSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Mapel Berhasil Ditambahkan -->

        <!-- Modal Notification Data Mapel Berhasil Dihapus -->
        <div class="modal fade" id="subjectDestroySuccess" tabindex="-1" role="dialog"
            aria-labelledby="subjectDestroySuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="subjectDestroySuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('subjectDestroySuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Mapel Berhasil Dihapus -->






    </div>
@endsection
