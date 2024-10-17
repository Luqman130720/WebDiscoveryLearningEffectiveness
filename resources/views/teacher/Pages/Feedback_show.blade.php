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

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Aspirasi</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Aspirasi</th>
                                            <th>Isi Aspirasi</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbacks as $key => $feedback)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $feedback->judul_aspirasi }}</td>
                                                <td>{{ $feedback->isi_aspirasi }}</td>
                                                <td>{{ $feedback->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <form action="{{ route('teacher.aspirasi.destroy', $feedback->id) }}"
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
