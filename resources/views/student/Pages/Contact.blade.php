@extends('student.Components.Layout')
@section('Content')

    <body>
        <div class="container-xxl bg-white p-0">



            <!-- Page Header End -->
            <div class="container-xxl py-5 page-header position-relative mb-5">
                <div class="container py-5">
                    <h1 class="display-2 text-white animated slideInDown mb-4">Contact Us</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Page Header End -->


            <!-- Contact Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h1 class="mb-3">Hubungi Kami</h1>
                        <p>Silakan hubungi kami untuk informasi lebih lanjut mengenai layanan kami di Alun-Alun Hanggawana
                            Slawi.</p>
                    </div>
                    <div class="row g-4 mb-5">
                        <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 75px; height: 75px;">
                                <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                            </div>
                            <h6>Alun-Alun Hanggawana, Slawi, Tegal, Indonesia</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 75px; height: 75px;">
                                <i class="fa fa-envelope-open fa-2x text-primary"></i>
                            </div>
                            <h6>info@alun-alunhanggawana.com</h6>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4"
                                style="width: 75px; height: 75px;">
                                <i class="fa fa-phone-alt fa-2x text-primary"></i>
                            </div>
                            <h6>+62 812 3456 7890</h6>
                        </div>
                    </div>
                    <div class="bg-light rounded">
                        <div class="row g-0">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="h-100 d-flex flex-column justify-content-center p-5">
                                    <p class="mb-4">Form kontak saat ini tidak aktif. Dapatkan form kontak yang berfungsi
                                        dan bekerja
                                        dengan Ajax & PHP dalam beberapa menit. Cukup salin dan tempel berkas, tambahkan
                                        sedikit kode, dan
                                        Anda selesai. <a href="https://htmlcodex.com/contact-form">Unduh Sekarang</a>.</p>
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="name"
                                                        placeholder="Nama Anda">
                                                    <label for="name">Nama Anda</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control border-0" id="email"
                                                        placeholder="Email Anda">
                                                    <label for="email">Email Anda</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control border-0" id="subject"
                                                        placeholder="Subjek">
                                                    <label for="subject">Subjek</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control border-0" placeholder="Tinggalkan pesan di sini" id="message" style="height: 100px"></textarea>
                                                    <label for="message">Pesan</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary w-100 py-3" type="submit">Kirim
                                                    Pesan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                                <div class="position-relative h-100">
                                    <iframe class="position-relative rounded w-100 h-100"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39710.14451709955!2d109.1254316398327!3d-6.874166619611636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fe20e8378827b%3A0xf9740c8a3b3d98e7!2sAlun-Alun%20Hanggawana!5e0!3m2!1sid!2sid!4v1603794290143!5m2!1sid!2sid"
                                        frameborder="0" style="min-height: 400px; border:0;" allowfullscreen=""
                                        aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Contact End -->



            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
@endsection
