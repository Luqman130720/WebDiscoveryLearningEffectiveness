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


    <!-- Facilities Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Positive Learning</h1>
                <p>Ruang belajar yang mendukung suasana belajar positif, dengan fasilitas modern dan lingkungan yang
                    kondusif. Kami fokus pada pembelajaran yang interaktif dan menyenangkan untuk mendorong kreativitas dan
                    inovasi siswa.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="facility-item">
                        <div class="facility-icon bg-primary">
                            <span class="bg-primary"></span>
                            <i class="fa fa-bus-alt fa-3x text-primary"></i>
                            <span class="bg-primary"></span>
                        </div>
                        <div class="facility-text bg-primary">
                            <h3 class="text-primary mb-3">Library</h3>
                            <p class="mb-0">Perpustakaan kami menyediakan koleksi buku lengkap dan beragam referensi.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="facility-item">
                        <div class="facility-icon bg-success">
                            <span class="bg-success"></span>
                            <i class="fa fa-futbol fa-3x text-success"></i>
                            <span class="bg-success"></span>
                        </div>
                        <div class="facility-text bg-success">
                            <h3 class="text-success mb-3">Science Lab</h3>
                            <p class="mb-0">
                                Laboratorium sains kami dilengkapi peralatan modern untuk eksperimen praktis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="facility-item">
                        <div class="facility-icon bg-warning">
                            <span class="bg-warning"></span>
                            <i class="fa fa-home fa-3x text-warning"></i>
                            <span class="bg-warning"></span>
                        </div>
                        <div class="facility-text bg-warning">
                            <h3 class="text-warning mb-3">Healthy Canteen</h3>
                            <p class="mb-0">
                                Kantin sehat kami menyediakan berbagai makanan bergizi dan higienis.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="facility-item">
                        <div class="facility-icon bg-info">
                            <span class="bg-info"></span>
                            <i class="fa fa-chalkboard-teacher fa-3x text-info"></i>
                            <span class="bg-info"></span>
                        </div>
                        <div class="facility-text bg-info">
                            <h3 class="text-info mb-3">Counseling Room</h3>
                            <p class="mb-0">Ruang konseling menyediakan layanan bimbingan dan dukungan emosional siswa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4">Explore Our Web-Based Learning and Discovery Methods</h1>
                    <p>Pembelajaran berbasis web membawa kemudahan dan fleksibilitas dalam proses belajar. Dengan metode
                        Discovery Learning, siswa diajak untuk menemukan pengetahuan secara mandiri, yang mendorong rasa
                        ingin tahu dan kreativitas. Metode ini sangat efektif dalam meningkatkan pemahaman konsep-konsep
                        yang kompleks dan relevan dengan dunia nyata.


                    </p>
                    <p class="mb-4">Melalui pembelajaran yang interaktif dan menyenangkan, siswa dapat belajar dari
                        pengalaman langsung dan menerapkan pengetahuan yang didapatkan dalam konteks yang berbeda. Kami
                        percaya bahwa pendekatan ini mampu meningkatkan motivasi dan kemandirian siswa, serta mempersiapkan
                        mereka untuk tantangan di masa depan.</p>

                    <div class="row g-4 align-items-center">
                        <div class="col-sm-6">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle flex-shrink-0" src="{{ asset('assets/user/img/user.jpg') }}"
                                    alt="" style="width: 45px; height: 45px;">
                                <div class="ms-3">
                                    <h6 class="text-primary mb-1">Jhon Doe</h6>
                                    <small>CEO & Founder DiscoLearn</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img class="img-fluid w-75 rounded-circle bg-light p-3"
                                src="{{ asset('assets/user/img/about-1.jpg') }}" alt="">
                        </div>
                        <div class="col-6 text-start" style="margin-top: -150px;">
                            <img class="img-fluid w-100 rounded-circle bg-light p-3"
                                src="{{ asset('assets/user/img/about-2.jpg') }}" alt="">
                        </div>
                        <div class="col-6 text-end" style="margin-top: -150px;">
                            <img class="img-fluid w-100 rounded-circle bg-light p-3"
                                src="{{ asset('assets/user/img/about-3.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Call To Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded"
                                src="{{ asset('assets/user/img/call-to-action.jpg') }}" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <h1 class="mb-4">Temukan Pembelajaran Melalui Penjelajahan</h1>
                            <p class="mb-4">
                                Pembelajaran berbasis penemuan adalah pendekatan yang menarik yang mendorong siswa untuk
                                mengeksplorasi dan menyelidiki topik sesuai dengan kecepatan mereka sendiri. Pendekatan ini
                                menekankan pentingnya rasa ingin tahu, memungkinkan siswa untuk mengajukan pertanyaan dan
                                mencari jawaban melalui pengalaman langsung dan aplikasi dunia nyata. Dengan memupuk
                                keterampilan berpikir kritis dan pemecahan masalah, pembelajaran berbasis penemuan
                                memberdayakan siswa untuk mengendalikan perjalanan pendidikan mereka.
                            </p>
                            <p class="mb-4">
                                Di platform kami, kami menyediakan berbagai sumber daya dan aktivitas yang dirancang untuk
                                merangsang rasa ingin tahu dan memfasilitasi eksplorasi mandiri. Apakah melalui pelajaran
                                interaktif, proyek kolaboratif, atau akses ke berbagai pengetahuan, kami percaya bahwa
                                belajar harus menjadi sebuah petualangan.
                            </p>
                            <a class="btn btn-primary py-3 px-5" href="">Mulai Perjalanan Penemuan Anda Sekarang<i
                                    class="fa fa-arrow-right ms-2"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->




    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Apa Kata Klien Kami!</h1>
                <p>Kami bangga dapat memberikan pengalaman pembelajaran yang menarik dan bermanfaat bagi para siswa kami.
                    Berikut adalah beberapa pendapat mereka!</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item bg-light rounded p-5">
                    <p class="fs-5">"Pembelajaran berbasis penemuan telah mengubah cara saya belajar. Saya merasa lebih
                        terlibat dan termotivasi untuk mengeksplorasi lebih jauh!"</p>
                    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('assets/user/img/testimonial-1.jpg') }}" style="width: 90px; height: 90px;">
                        <div class="ps-3">
                            <h3 class="mb-1">Rina Susanti</h3>
                            <span>Siswa</span>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-5">
                    <p class="fs-5">"Metode pembelajaran ini membuat saya lebih mudah memahami konsep-konsep yang sulit.
                        Sangat merekomendasikan!"</p>
                    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('assets/user/img/testimonial-2.jpg') }}" style="width: 90px; height: 90px;">
                        <div class="ps-3">
                            <h3 class="mb-1">Andi Prasetyo</h3>
                            <span>Siswa</span>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    </div>
                </div>
                <div class="testimonial-item bg-light rounded p-5">
                    <p class="fs-5">"Saya sangat menikmati pengalaman belajar dengan pendekatan ini. Rasanya seperti
                        petualangan setiap kali!"</p>
                    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">
                        <img class="img-fluid flex-shrink-0 rounded-circle"
                            src="{{ asset('assets/user/img/testimonial-3.jpg') }}" style="width: 90px; height: 90px;">
                        <div class="ps-3">
                            <h3 class="mb-1">Budi Setiawan</h3>
                            <span>Siswa</span>
                        </div>
                        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
