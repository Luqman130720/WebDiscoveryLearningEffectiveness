@extends('Administrator.Components.Layout')
@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">

        <!-- Header Admin Account -->
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
                                        data-bs-toggle="modal" data-bs-target="#inputDataGuru">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Tambah Data Guru</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Admin Account -->

        <!-- View Data Guru -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Guru</h6>
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
                                                NIP</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama Lengkap</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                e-mail</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tanggal Lahir</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0 ps-2">
                                                        {{ $loop->iteration }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">{{ $teacher->nip }}</p>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('storage/' . $teacher->foto_profil) }}"
                                                                class="avatar avatar-sm me-3" alt="user">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $teacher->nama }}</h6>
                                                            <p class="text-xs text-secondary mb-0">
                                                                {{ $teacher->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $teacher->email }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($teacher->tanggal_lahir)->format('d/m/Y') }}</span>
                                                </td>
                                                <td class="align-middle text-center">

                                                    <form action="{{ route('operator.teachers.destroy', $teacher->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn bg-gradient-danger text-light font-weight-bold text-xs ms-2"
                                                            data-toggle="tooltip" title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this teacher?');">
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
            @include('administrator.Components.Footer')
        </div>
        <!-- View Data Guru -->


        <!-- Modal Input Data Guru -->
        <div class="modal fade" id="inputDataGuru" tabindex="-1" role="dialog" aria-labelledby="inputDataGuruModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputDataGuruModalLabel">Masukkan Data Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formInputDataGuru" action="{{ route('operator.teacher.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" maxlength="20"
                                    placeholder="Masukkan NIP" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" maxlength="50"
                                    placeholder="Masukkan username" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Guru</label>
                                <input type="text" class="form-control" id="nama" name="nama" maxlength="100"
                                    placeholder="Masukkan nama guru" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukkan email (opsional)">
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                    maxlength="100" placeholder="Masukkan tempat lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan password" required>
                            </div>
                            <div class="form-group">
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
                            <div class="form-group">
                                <label for="foto_profil">Foto Profil (opsional)</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil"
                                    accept="image/*">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-warning"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-round bg-gradient-info" form="formInputDataGuru">Simpan
                            Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal Input Data Guru -->

        <!-- Alert Notification for Teacher Actions -->
        <script>
            window.onload = function() {

                // Check if there is a success notification for teacher input
                @if (session('teacherInputSuccess'))
                    var inputNotificationModal = new bootstrap.Modal(document.getElementById('teacherInputSuccess'));
                    inputNotificationModal.show();
                @endif

                // Check if there is a success notification for teacher delete
                @if (session('teacherDeleteSuccess'))
                    var deleteNotificationModal = new bootstrap.Modal(document.getElementById('teacherDeleteSuccess'));
                    deleteNotificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification Data Guru Berhasil DiImport -->
        <div class="modal fade" id="teacherInputSuccess" tabindex="-1" role="dialog"
            aria-labelledby="teacherInputSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="teacherInputSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('teacherInputSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Guru Berhasil DiImport -->

        <!-- Modal Notification Data Guru Berhasil Dihapus -->
        <div class="modal fade" id="teacherDeleteSuccess" tabindex="-1" role="dialog"
            aria-labelledby="teacherDeleteSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-danger modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="teacherDeleteSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('teacherDeleteSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Guru Berhasil Dihapus -->



    </div>
@endsection
