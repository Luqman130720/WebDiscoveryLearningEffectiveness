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
                    <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info mb-0 px-2 py-1 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#modal-add-data"
                                        aria-label="Add Virtual Class">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Kelas Virtual</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Tambah Kelas Virtual -->
        <div class="modal fade" id="modal-add-data" tabindex="-1" role="dialog" aria-labelledby="modal-add-data"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h3 class="font-weight-bolder text-info text-gradient">Tambah Kelas Virtual</h3>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('teacher.virtual-classes.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="agenda" class="form-label">Agenda</label>
                                        <input type="text" class="form-control" id="agenda" name="agenda" required
                                            placeholder="Masukkan agenda kelas" aria-describedby="agendaHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label for="kelas" class="form-label">Kelas</label>
                                        <select class="form-control" id="kelas" name="kelas" required
                                            aria-describedby="kelasHelp">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}">{{ $classroom->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required
                                            aria-describedby="tanggalHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                        <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai"
                                            required aria-describedby="waktuMulaiHelp">
                                    </div>

                                    <div class="mb-3">
                                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                                        <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai"
                                            required aria-describedby="waktuSelesaiHelp">

                                    </div>

                                    <div class="mb-3">
                                        <label for="link_kelas_virtual" class="form-label">Link Kelas Virtual</label>
                                        <input type="url" class="form-control" id="link_kelas_virtual"
                                            name="link_kelas_virtual" required placeholder="Masukkan link kelas virtual"
                                            aria-describedby="linkKelasHelp">
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambah
                                            Kelas</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Tambah Kelas Virtual -->

        <!-- Alert Notification for User Upload Success and Destroy Data Siswa Success -->
        <script>
            window.onload = function() {
                @if (session('success'))
                    var virtualClassAddNotificationModal = new bootstrap.Modal(document.getElementById(
                        'virtualClassAddSuccess'));
                    virtualClassAddNotificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification for Adding Virtual Class Success -->
        <div class="modal fade" id="virtualClassAddSuccess" tabindex="-1" role="dialog"
            aria-labelledby="virtualClassAddSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="virtualClassAddSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Notification for Adding Virtual Class Success -->

        <!-- Modal Notification for Deleting Virtual Class Success -->
        <div class="modal fade" id="virtualClassDestroySuccess" tabindex="-1" role="dialog"
            aria-labelledby="virtualClassDestroySuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="virtualClassDestroySuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal Notification for Deleting Virtual Class Success -->




        <!-- View Kelas Virtual -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Kelas Virtual</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            @foreach ($kelasVirtual as $kelas)
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ms-2">
                                                    No</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Agenda</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Kelas</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Waktu Mulai - Selesai</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Link Kelas Virtual</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center text-secondary text-xs">{{ $loop->iteration }}</td>
                                                <td class="text-secondary text-xs">{{ $kelas->agenda }}</td>
                                                <td class="text-center text-secondary text-xs">{{ $kelas->kelas }}</td>
                                                <td class="text-center text-secondary text-xs">{{ $kelas->waktu_mulai }} -
                                                    {{ $kelas->waktu_selesai }}</td>
                                                <td class="text-center text-secondary text-xs"><a
                                                        href="{{ $kelas->link_kelas_virtual }}"
                                                        class="btn bg-gradient-warning btn-xs btn-round"
                                                        target="_blank">Link Kelas</a></td>
                                                <td class="text-center text-secondary text-xs">
                                                    <form
                                                        action="{{ route('teacher.virtual-classes.destroy', $kelas->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm" title="Hapus"
                                                            aria-label="Hapus Kelas">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @include('teacher.Components.Footer')
        </div>
        <!-- View Kelas Virtual -->
    </div>
@endsection
