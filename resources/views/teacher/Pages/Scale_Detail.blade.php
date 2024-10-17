@extends('Teacher.Components.Layout')
@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ $teacher->foto_profil ? asset('storage/' . $teacher->foto_profil) : asset('assets/admin/img/default-avatar.jpg') }}"
                                alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ $teacher->nama }} <!-- Display Teacher's Name -->
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ $teacher->email }} <!-- Display Teacher's Email -->
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                                <li class="nav-item">
                                    <a
                                        class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Review Scale</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid py-4">
            @if ($likertScales->isNotEmpty())
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title text-center">Informasi Hasil Skala Likert</h5>
                                <p class="mb-1"><strong>NISN:</strong> {{ $likertScales[0]->nisn }}</p>
                                <p class="mb-1"><strong>Nama:</strong> {{ $likertScales[0]->name }}</p>
                                <p class="mb-1"><strong>Kelas:</strong> {{ $likertScales[0]->class }}</p>
                                <p class="mb-1"><strong>Jenis Kelamin:</strong>
                                    {{ $likertScales[0]->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>

                            </div>
                        </div>

                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ms-2"
                                            style="width: 100px">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                            Pertanyaan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Skala</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalScore = 0;
                                    @endphp
                                    @foreach ($likertScales as $index => $scale)
                                        <tr>
                                            <td class="text-secondary text-xs ps-4" style="width: 100px">{{ $index + 1 }}
                                            </td>
                                            <td class="text-secondary text-xs">{{ $scale->question->question_text }}</td>
                                            <td class="text-secondary text-xs">{{ $scale->scale }}</td>
                                        </tr>
                                        @php
                                            $totalScore += $scale->scale;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="text-secondary text-xs text-end font-weight-bolder">Total
                                            Skor:</td>
                                        <td class="text-secondary text-xs">{{ $totalScore }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <p>Tidak ada data yang tersedia untuk NISN ini.</p>
            @endif

            <a href="{{ route('teacher.review') }}" class="btn btn-primary">Kembali</a>
            @include('teacher.Components.Footer')
        </div>
    </div>
@endsection
