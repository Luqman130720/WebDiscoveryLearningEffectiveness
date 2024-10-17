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
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Informasi Tugas</h1>
                <p>Tugas-tugas berikut akan membantu Anda dalam belajar lebih baik dan mempersiapkan diri untuk ujian.</p>
            </div>
            <div class="row g-4">
                @foreach ($assignments as $assignment)
                    <div class="col-lg-4 col-md-6">
                        <div class="card rounded shadow border-0">
                            <div class="card-body">
                                <h5 class="card-title">{{ $assignment->judul_tugas }}</h5>

                                <p class="card-text">Tanggal Pengumpulan:
                                    <strong>{{ \Carbon\Carbon::parse($assignment->tanggal_pengumpulan)->format('d M Y') }}</strong>
                                </p>
                                <p class="card-text">Waktu Pengumpulan:
                                    <strong>{{ $assignment->waktu_pengumpulan }}</strong>
                                </p>
                                @if ($assignment->link_file)
                                    <a class="btn btn-warning btn-xs btn-round" href="{{ asset($assignment->link_file) }}"
                                        target="_blank" role="button">Link</a>
                                @endif

                                <a class="btn btn-secondary btn-xs btn-round"
                                    href="{{ asset('storage/' . $assignment->unggah_soal) }}" target="_blank"
                                    role="button">Unduh Soal</a>
                                <a href="{{ route('student.submision.dashboard') }}" class="btn btn-primary">Kirimkan
                                    Tugas</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Tugas End -->
@endsection
