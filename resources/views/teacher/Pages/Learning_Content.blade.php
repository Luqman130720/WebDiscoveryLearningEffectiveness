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

        <!-- Alert Notification for User Upload Success -->
        <script>
            window.onload = function() {
                @if (session('success'))
                    var learningContentAddNotificationModal = new bootstrap.Modal(document.getElementById(
                        'learningContentAddSuccess'));
                    learningContentAddNotificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification for Adding Learning Content Success -->
        <div class="modal fade" id="learningContentAddSuccess" tabindex="-1" role="dialog"
            aria-labelledby="learningContentAddSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="learningContentAddSuccessLabel">Success</h6>
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
        <!-- Modal Notification for Adding Learning Content Success -->






        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 m-4">
                            <form action="{{ route('teacher.learning-content') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="judul_konten" class="form-label">Judul Konten</label>
                                    <input type="text" class="form-control" id="judul_konten" name="judul_konten"
                                        required placeholder="Masukkan judul konten">
                                </div>

                                <div class="mb-3">
                                    <label for="pengarang" class="form-label">Pengarang</label>
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" required
                                        placeholder="Masukkan nama pengarang">
                                </div>

                                <div class="mb-3">
                                    <label for="penerbit" class="form-label">Penerbit</label>
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" required
                                        placeholder="Masukkan nama penerbit">
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Masukkan deskripsi konten"
                                        rows="3"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="cover" class="form-label">Cover</label>
                                    <input type="file" class="form-control" id="cover" name="cover" required>
                                </div>

                                <div class="mb-3">
                                    <label for="file_konten" class="form-label">File Konten</label>
                                    <input type="file" class="form-control" id="file_konten" name="file_konten" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select class="form-control" id="kelas" name="kelas" required
                                        aria-describedby="kelasHelp">
                                        <option value="">Pilih Kelas</option>
                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambah
                                        Konten</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('teacher.Components.Footer')
        </div>

    </div>
@endsection
