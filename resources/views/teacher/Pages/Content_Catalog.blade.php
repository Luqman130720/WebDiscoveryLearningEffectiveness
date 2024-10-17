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

        <!-- Alert Notification for User Delete Success -->
        <script>
            window.onload = function() {
                @if (session('success_delete'))
                    var learningContentDeleteNotificationModal = new bootstrap.Modal(document.getElementById(
                        'learningContentDeleteSuccess'));
                    learningContentDeleteNotificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification for Deleting Learning Content Success -->
        <div class="modal fade" id="learningContentDeleteSuccess" tabindex="-1" role="dialog"
            aria-labelledby="learningContentDeleteSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="learningContentDeleteSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('success_delete') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Notification for Deleting Learning Content Success -->




        <div class="container-fluid py-4">
            <div class="row">

                @foreach ($learningContents as $content)
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="card mb-4">
                            <div class="card-body px-0 pt-0">
                                <div class="card">
                                    <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                        <a href="{{ route('teacher.content.show', $content->id) }}"
                                            class="d-block position-relative">
                                            <img src="{{ asset('storage/' . $content->cover) }}"
                                                class="img-fluid border-radius-lg" alt="{{ $content->judul_konten }}">
                                            <!-- Date in the top-left corner -->
                                            <div class="position-absolute top-0 start-0 m-2 p-1 bg-white text-dark rounded">
                                                <small>{{ $content->created_at->format('d F Y') }}</small>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="card-body pt-2">
                                        <a href="{{ route('teacher.content.show', $content->id) }}"
                                            class="card-title h5 d-block text-center text-dark font-weight-bold">
                                            {{ $content->judul_konten }}
                                        </a>

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('teacher.content.destroy', $content->id) }}" method="POST"
                                            class="text-center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mt-2"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus konten ini?');">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>


            @include('teacher.Components.Footer')
        </div>
    </div>
@endsection
