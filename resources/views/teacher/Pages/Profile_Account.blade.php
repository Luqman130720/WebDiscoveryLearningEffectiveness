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
                                    <span
                                        class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                                        <!-- Change icon to something more related to settings -->
                                        <span class="ms-2">Update Profil</span>
                                    </span>
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







        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4 p-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <form action="{{ route('teacher.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Username Field -->
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        value="{{ old('username', $teacher->username) }}" required>
                                </div>

                                <!-- Nama Field -->
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control"
                                        value="{{ old('nama', $teacher->nama) }}" required>
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $teacher->email) }}">
                                </div>

                                <!-- Gender Field -->
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="L" {{ $teacher->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="P" {{ $teacher->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>

                                <!-- Birthplace and Birthday Fields -->
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                        value="{{ old('tempat_lahir', $teacher->tempat_lahir) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                        value="{{ old('tanggal_lahir', $teacher->tanggal_lahir) }}" required>
                                </div>

                                <!-- Address Field -->
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control"
                                        value="{{ old('alamat', $teacher->alamat) }}" required>
                                </div>

                                <!-- Religion Field -->
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" id="agama" class="form-control"
                                        value="{{ old('agama', $teacher->agama) }}" required>
                                </div>

                                <!-- Photo Upload -->
                                <div class="form-group">
                                    <label for="foto_profil">Foto Profil</label>
                                    <input type="file" name="foto_profil" id="foto_profil" class="form-control"
                                        onchange="previewImage(event)">
                                    @if ($teacher->foto_profil)
                                        <img src="{{ asset('storage/' . $teacher->foto_profil) }}" alt="Profile Picture"
                                            class="img-fluid mt-2" style="width: 100px;">
                                    @endif
                                    <img id="imagePreview" class="img-fluid mt-2" style="width: 100px; display: none;">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>

                            <script>
                                function previewImage(event) {
                                    const input = event.target;
                                    const reader = new FileReader();

                                    reader.onload = function() {
                                        const imagePreview = document.getElementById('imagePreview');
                                        imagePreview.src = reader.result;
                                        imagePreview.style.display = 'block';
                                    }

                                    if (input.files && input.files[0]) {
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('teacher.Components.Footer')
    </div>
    </div>
@endsection
