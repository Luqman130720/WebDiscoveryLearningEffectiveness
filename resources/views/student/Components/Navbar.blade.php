<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="index.html" class="navbar-brand">
        <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>DiscoLearn</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="{{ route('student.dashboard') }}" class="nav-item nav-link active">Beranda</a>
            <a href="{{ route('student.aboutUs') }}" class="nav-item nav-link">Tentang Kami</a>
            <a href="{{ route('student.learning-content') }}" class="nav-item nav-link">Kelas</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Assesement</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="{{ route('student.quiz.index') }}" class="dropdown-item">Quizz</a>
                    <a href="team.html" class="dropdown-item">Ujian</a>
                    <a href="{{ route('student.assignment.dashboard') }}" class="dropdown-item">Tugas</a>
                    <a href="{{ route('likert.create') }}" class="dropdown-item">Skala Likert</a>
                </div>
            </div>
            <a href="{{ route('student.feedback') }}" class="nav-item nav-link">Kritik dan Saran</a>
            <a href="{{ route('student.Contact') }}" class="nav-item nav-link">Hubungi Kami</a>
        </div>
        <div class="dropdown">
            @php
                $student = auth()->guard('student')->user();
            @endphp

            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ $student->foto_profil ? asset('storage/' . $student->foto_profil) : asset('assets/admin/img/default-avatar.jpg') }}"
                    alt="Profile" width="40" height="40" class="rounded-circle">
            </a>
            <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser1">
                <li class="dropdown-item text-center">
                    <strong>{{ $student->nama }}</strong><br>
                    <small class="text-muted">{{ $student->email }}</small>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('student.profile.update') }}">Profil</a>
                </li>
                <li>
                    <form action="{{ route('student.logout') }}" method="POST" class="mb-0">
                        @csrf
                        <button class="dropdown-item" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>


    </div>
</nav>
<!-- Navbar End -->
