@extends('Administrator.Components.Layout')
@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">

        <!-- Header Operator Account -->
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets/admin/img/team-1.jpg') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Sayo Kravits
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                Public Relations
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1 bg-gray-300" role="tablist">
                                <li class="nav-item">
                                    <a class="btn bg-gradient-info mb-0 px-0 py-1 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#inputDataSiswa">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Data Siswa</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Operator Account -->

        <!-- View Data Siswa -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Siswa</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                No.</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NIS</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Lengkap</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Kelas</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal Lahir</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 ps-2">
                                                        {{ $loop->iteration }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $student->nisn }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('storage/' . $student->foto_profil) }}"
                                                                class="avatar avatar-sm me-3" alt="user">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $student->nama }}</h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $student->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $student->kelas }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('d/m/Y') }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href=""
                                                        class="btn bg-gradient-info text-light font-weight-bold text-xs ms-2"
                                                        data-toggle="tooltip" title="View">
                                                        <i class="bi bi-eye"></i>
                                                    </a>

                                                    <a href=""
                                                        class="btn bg-gradient-success text-light font-weight-bold text-xs ms-2"
                                                        data-toggle="tooltip" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <form action="{{ route('operator.student.destroy', $student->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn bg-gradient-danger text-light font-weight-bold text-xs ms-2"
                                                            data-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                                            <i class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
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
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- View Data Siswa -->

        <!-- Modal Input Data Siswa -->
        <div class="modal fade" id="inputDataSiswa" tabindex="-1" role="dialog" aria-labelledby="inputDataModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputDataModalLabel">Masukkan Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formInputDataSiswa" action="{{ route('operator.student.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" maxlength="20"
                                    placeholder="Masukkan NISN" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nis_sekolah">NIS Sekolah</label>
                                <input type="text" class="form-control" id="nis_sekolah" name="nis_sekolah"
                                    maxlength="20" placeholder="Masukkan NIS Sekolah" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    maxlength="100" placeholder="Masukkan nama siswa" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    maxlength="50" placeholder="Masukkan username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email (opsional)</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="kelas">Kelas</label>
                                <select class="form-control" id="kelas" name="kelas" required>
                                    <option value="" disabled selected>Pilih kelas</option>
                                    @foreach ($classrooms as $classroom)
                                        <option value="{{ $classroom->nama_kelas }}">{{ $classroom->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    maxlength="100" placeholder="Masukkan tempat lahir" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="agama">Agama</label>
                                <select class="form-control" id="agama" name="agama" required>
                                    <option value="" disabled selected>Pilih agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="foto_profil">Foto Profil (opsional)</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil"
                                    accept="image/*">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-warning"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-round bg-gradient-info" form="formInputDataSiswa">Simpan
                            Data</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Input Data Siswa -->

        <!-- Alert Notification Data Siswa Berhasil Ditambahkan -->
        <script>
            window.onload = function() {
                @if (session('studentImportSuccess'))
                    var importNotificationModal = new bootstrap.Modal(document.getElementById('studentImportSuccess'));
                    importNotificationModal.show();
                @endif

                @if (session('studentDeleteSuccess'))
                    var deleteNotificationModal = new bootstrap.Modal(document.getElementById('studentDeleteSuccess'));
                    deleteNotificationModal.show();
                @endif
            };
        </script>
        <!-- Alert Notification Data Siswa Berhasil Ditambahkan -->

        <!-- Modal Notification Data Siswa Berhasil DiImport -->
        <div class="modal fade" id="studentImportSuccess" tabindex="-1" role="dialog"
            aria-labelledby="studentImportSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="studentImportSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('studentImportSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Siswa Berhasil DiImport -->

        <!-- Modal Notification Data Siswa Berhasil Dihapus -->
        <div class="modal fade" id="studentDeleteSuccess" tabindex="-1" role="dialog"
            aria-labelledby="studentDeleteSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="studentDeleteSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('studentDeleteSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Siswa Berhasil Dihapus -->


    </div>
@endsection
