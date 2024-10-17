@extends('student.Components.Layout')
@section('Content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/user/img/carousel-1.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">Efektivitas Pembelajaran Berbasis
                                    Web</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Maksimalkan potensi siswa melalui
                                    pembelajaran berbasis web yang interaktif dan inovatif dengan metode Discovery Learning.
                                    Menemukan, mengembangkan, dan menerapkan pengetahuan secara mandiri untuk hasil yang
                                    lebih baik.</p>
                                <a href=""
                                    class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Pelajari
                                    Lebih Lanjut</a>
                                <a href=""
                                    class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Program Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="{{ asset('assets/user/img/carousel-2.jpg') }}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .2);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-2 text-white animated slideInDown mb-4">Mendorong Kemandirian Belajar
                                </h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Dengan Discovery Learning, siswa diajak untuk
                                    menemukan sendiri solusi atas tantangan belajar, mengasah keterampilan berpikir kritis,
                                    dan mengembangkan wawasan baru yang relevan dengan dunia industri.</p>
                                <a href=""
                                    class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Pelajari
                                    Lebih Lanjut</a>
                                <a href=""
                                    class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Metode Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Profile Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Account Profile</h1>
                <p>Berikut adalah feedback dari guru yang dapat membantu Anda dalam proses belajar.</p>
            </div>

            @php
                $student = auth()->guard('student')->user(); // Get the authenticated student
            @endphp

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card shadow">
                        <div class="card-body text-center">
                            @if ($student->foto_profil)
                                <!-- Check if the profile picture exists -->
                                <img src="{{ $student->foto_profil ? asset('storage/' . $student->foto_profil) : asset('assets/admin/img/default-avatar.jpg') }}"
                                    alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px;">
                            @else
                                <img src="{{ asset('https://img.freepik.com/premium-vector/avatar-profile-icon-flat-style-male-user-profile-vector-illustration-isolated-background-man-profile-sign-business-concept_157943-38764.jpg') }}"
                                    alt="Default Profile Picture" class="rounded-circle"
                                    style="width: 150px; height: 150px;">
                            @endif

                            <h5 class="mt-3">{{ $student->nama }}</h5>
                            <p class="text-muted">{{ $student->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 mb-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="mb-4">Update Profile</h5>
                            <form action="{{ route('student.profile.update.submit') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ old('username', $student->username) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ old('nama', $student->nama) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $student->email) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                        <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        value="{{ old('tempat_lahir', $student->tempat_lahir) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $student->alamat) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input type="text" class="form-control" id="agama" name="agama"
                                        value="{{ old('agama', $student->agama) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="foto_profil" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control" id="foto_profil" name="foto_profil"
                                        accept="image/*" onchange="previewImage(event)">
                                    <img id="profileImagePreview"
                                        src="{{ asset('storage/' . ($student->foto_profil ?? 'default-image.jpg')) }}"
                                        alt="Profile Preview" class="img-fluid mt-2"
                                        style="width: 100px; display: none;">
                                </div>

                                <script>
                                    function previewImage(event) {
                                        const input = event.target;
                                        const preview = document.getElementById('profileImagePreview');

                                        if (input.files && input.files[0]) {
                                            const reader = new FileReader();
                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block'; // Show the image preview
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        } else {
                                            preview.src = ''; // Clear the preview if no file is selected
                                            preview.style.display = 'none'; // Hide the image preview
                                        }
                                    }
                                </script>

                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profile End -->
@endsection
