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


    <!-- Tugas Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Tugas Start -->
                    <div class="container-xxl py-5">
                        <div class="container">
                            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                                style="max-width: 600px;">
                                <h1 class="mb-3">Form Pengiriman Tugas</h1>
                                <p>Tugas-tugas berikut akan membantu Anda dalam belajar lebih baik dan mempersiapkan diri
                                    untuk ujian.</p>
                            </div>

                            <form action="{{ route('student.submit.assignment') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="assignment_id" class="form-label">Pilih Tugas</label>
                                    <select class="form-control" id="assignment_id" name="assignment_id" required>
                                        <option value="" disabled selected>Pilih tugas</option>
                                        @foreach ($assignments as $assignment)
                                            <option value="{{ $assignment->id }}">{{ $assignment->judul_tugas }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" class="form-control" id="kelas" name="kelas" required>
                                </div>

                                <div class="mb-3">
                                    <label for="file_tugas" class="form-label">Unggah Tugas</label>
                                    <input type="file" class="form-control" id="file_tugas" name="file_tugas" required>
                                    <small class="text-muted">Harap unggah file dalam format PDF, DOC, atau DOCX (maksimal
                                        2MB).</small>
                                </div>

                                <div class="mb-3">
                                    <label for="link_tugas" class="form-label">Link Tugas (opsional)</label>
                                    <input type="url" class="form-control" id="link_tugas" name="link_tugas"
                                        placeholder="https://contoh.com">
                                </div>

                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan (opsional)</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                </div>

                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Kirimkan Tugas</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- Tugas End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Tugas End -->
@endsection
