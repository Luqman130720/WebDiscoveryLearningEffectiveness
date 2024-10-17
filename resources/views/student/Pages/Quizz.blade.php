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
    <div class=" row g-5">
        @foreach ($quizzes as $quiz)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="facility-item">
                    <div class="facility-icon bg-primary">
                        <span class="bg-primary"></span>
                        <i class="fa fa-bus-alt fa-3x text-primary"></i>
                        <span class="bg-primary"></span>
                    </div>
                    <div class="facility-text bg-primary">
                        <h3 class="text-primary mb-3">{{ $quiz->judul_kuis }}</h3>
                        <p class="mb-0">{{ \Carbon\Carbon::parse($quiz->tanggal_pengerjaan)->format('d M Y') }}</p>
                        <p class="mb-0">
                            {{ \Carbon\Carbon::parse($quiz->waktu_pengerjaan)->format('H:i') }}
                        </p>
                        {{-- <button href="{{ $quiz->link_kuis }}" class="btn btn-primary btn-sm mt-3">Mulai Kuis</button> --}}
                        <div class="text-center mt-2">
                            <a href="{{ $quiz->link_kuis }}" class="btn btn-sm btn-dark rounded-pill py-2 px-4">Mulai</a>
                        </div>


                    </div>
                </div>

            </div>
        @endforeach
    @endsection


    {{-- <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="facility-item">
            <div class="facility-icon bg-primary">
                <span class="bg-primary"></span>
                <i class="fa fa-file-alt fa-3x text-primary"></i>
                <span class="bg-primary"></span>
            </div>
            <div class="facility-text bg-primary p-3">
                <h4 class="text-white mb-3">{{ $quiz->mata_pelajaran }}</h4>
                <p class="text-white mb-0"><strong>Judul Kuis:</strong> {{ $quiz->judul_kuis }}</p>
                <p class="text-white mb-0"><strong>Kelas:</strong> {{ $quiz->classroom->nama_kelas }}</p>
                <p class="text-white mb-0"><strong>Tanggal:</strong>
                    {{ \Carbon\Carbon::parse($quiz->tanggal_pengerjaan)->format('d M Y') }}</p>
                <p class="text-white mb-0"><strong>Waktu:</strong>
                    {{ \Carbon\Carbon::parse($quiz->waktu_pengerjaan)->format('H:i') }}</p>
                <a href="{{ $quiz->link_kuis }}" class="btn btn-light mt-3">Mulai Kuis</a>
            </div>
        </div>
    </div> --}}
