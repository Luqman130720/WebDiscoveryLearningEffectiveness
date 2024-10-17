    <aside
        class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('operator.dashboard') }}" target="_blank">
                <img src="{{ asset('assets/admin/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100"
                    alt="main_logo">
                <span class="ms-1 font-weight-bold">DiscoLearn</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('operator.dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kelola User</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#dataSiswaDropdown"
                        aria-expanded="false" aria-controls="dataSiswaDropdown">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Siswa</span>
                    </a>
                    <div class="collapse" id="dataSiswaDropdown">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.student.create') }}">
                                    <span class="nav-link-text">Create Data Siswa</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.student.import') }}">
                                    <span class="nav-link-text">Import Data Siswa</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#dataGuruDropdown"
                        aria-expanded="false" aria-controls="dataGuruDropdown">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Guru</span>
                    </a>
                    <div class="collapse" id="dataGuruDropdown">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.teacher.create') }}">
                                    <span class="nav-link-text">Create Data Guru</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.teacher.import') }}">
                                    <span class="nav-link-text">Import Data Guru</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Kelola Kelas & Mapel</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-bs-toggle="collapse" data-bs-target="#dataKelasDropdown"
                        aria-expanded="false" aria-controls="dataKelasDropdown">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-app text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data Kelas</span>
                    </a>
                    <div class="collapse" id="dataKelasDropdown">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.classroom.create') }}">
                                    <span class="nav-link-text">Create Data Kelas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.classroom.import') }}">
                                    <span class="nav-link-text">Import Data Kelas</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#dataMapelDropdown"
                        aria-expanded="false" aria-controls="dataMapelDropdown">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Mata Pelajaran</span>
                    </a>
                    <div class="collapse" id="dataMapelDropdown">
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.subject.create') }}">
                                    <span class="nav-link-text">Create Data Mapel</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('operator.subject.import') }}">
                                    <span class="nav-link-text">Import Data Mapel</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('questions.create') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Soal Skala Likert</span>
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
            <form action="{{ route('operator.logout') }}" method="POST" class="mb-0">
                @csrf
                <button class="btn btn-primary btn-sm w-100" type="submit">Logout</button>
            </form>
        </div>
    </aside>
