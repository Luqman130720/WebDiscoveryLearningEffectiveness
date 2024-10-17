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



    <div class="container">
        <h2>Isi Skala Likert</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @php
            $student = auth()->guard('student')->user();
        @endphp

        <form action="{{ route('likert.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $student->nisn }}"
                    readonly>
            </div>

            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $student->nama }}"
                    readonly>
            </div>

            <div class="form-group">
                <label for="class">Kelas</label>
                <input type="text" name="class" id="class" class="form-control" value="{{ $student->kelas }}"
                    readonly>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L"
                        {{ $student->jenis_kelamin == 'L' ? 'checked' : '' }} required>
                    <label class="form-check-label">Laki-laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P"
                        {{ $student->jenis_kelamin == 'P' ? 'checked' : '' }} required>
                    <label class="form-check-label">Perempuan</label>
                </div>
            </div>

            <div class="form-group mt-5">
                <h6>Pilih Skala untuk Pertanyaan Berikut</h6>
                @foreach ($questions as $question)
                    <div class="question-item">
                        <label>{{ $question->question_text }}</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scale[{{ $question->id }}]"
                                id="scale1_{{ $question->id }}" value="1" required>
                            <label class="form-check-label" for="scale1_{{ $question->id }}">1 (Sangat Tidak
                                Setuju)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scale[{{ $question->id }}]"
                                id="scale2_{{ $question->id }}" value="2" required>
                            <label class="form-check-label" for="scale2_{{ $question->id }}">2 (Tidak Setuju)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scale[{{ $question->id }}]"
                                id="scale3_{{ $question->id }}" value="3" required>
                            <label class="form-check-label" for="scale3_{{ $question->id }}">3 (Netral)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scale[{{ $question->id }}]"
                                id="scale4_{{ $question->id }}" value="4" required>
                            <label class="form-check-label" for="scale4_{{ $question->id }}">4 (Setuju)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="scale[{{ $question->id }}]"
                                id="scale5_{{ $question->id }}" value="5" required>
                            <label class="form-check-label" for="scale5_{{ $question->id }}">5 (Sangat Setuju)</label>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Simpan Skala Likert</button>
        </form>


    </div>
@endsection
