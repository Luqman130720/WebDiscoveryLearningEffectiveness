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
                </div>
            </div>
        </div>




        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ms-2">
                                                No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Siswa</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Judul Tugas</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kelas</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal Pengiriman</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($submissions as $submission)
                                            <tr>
                                                <td class="text-center text-secondary text-xs">{{ $loop->iteration }}</td>
                                                <td class="text-secondary text-xs">{{ $submission->nama_siswa }}</td>
                                                <td class="text-secondary text-xs">
                                                    {{ $submission->assignment->judul_tugas }}</td>
                                                <td class="text-secondary text-xs">{{ $submission->kelas }}</td>
                                                <td class="text-center text-secondary text-xs">
                                                    {{ $submission->created_at->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center text-secondary text-xs">
                                                    <a href="{{ route('submissions.download', $submission->id) }}"
                                                        class="btn btn-info btn-sm" title="Download">
                                                        <i class="bi bi-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>



                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('teacher.Components.Footer')
        </div>
    </div>
@endsection
