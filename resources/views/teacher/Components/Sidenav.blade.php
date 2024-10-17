<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('teacher.dashboard') }}" target="_blank">
            <img src="{{ asset('assets/admin/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">DiscoLearn</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kelola Materi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('teacher.virtual-classes') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-book-bookmark text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelas Virtual</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#dataSiswaDropdown" aria-expanded="false"
                    aria-controls="dataSiswaDropdown">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Modul/Tugas</span>
                </a>
                <div class="collapse" id="dataSiswaDropdown">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.assignment.dashboard') }}">
                                <span class="nav-link-text">Daftar Modul/Tugas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.submission.dashboard') }}">
                                <span class="nav-link-text">Unduh Modul/Tugas</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#kontenBelajarDropdown"
                    aria-expanded="false" aria-controls="kontenBelajarDropdown">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Konten Belajar</span>
                </a>
                <div class="collapse" id="kontenBelajarDropdown">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.content.catalog') }}">
                                <span class="nav-link-text">Katalog Konten</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.learning-content') }}">
                                <span class="nav-link-text">Pengaturan Konten</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Ice Breaking</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('teacher.quiz.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quiz</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kelola Ujian</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.review') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Review Skala Likert</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kelola Aspirasi</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#feedbackDropdown" aria-expanded="false"
                    aria-controls="feedbackDropdown">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Feedback</span>
                </a>
                <div class="collapse" id="feedbackDropdown">
                    <ul class="nav flex-column ms-4">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.feedback.index') }}">
                                <span class="nav-link-text">Manage Feedback</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('teacher.feedback.show') }}">
                                <span class="nav-link-text">View Feedback</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('teacher.profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('assets/admin/img/illustrations/icon-documentation.svg') }}"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <form action="{{ route('teacher.logout') }}" method="POST" class="mb-0">
            @csrf
            <button class="btn btn-primary btn-sm w-100" type="submit">Logout</button>
        </form>
    </div>
</aside>
