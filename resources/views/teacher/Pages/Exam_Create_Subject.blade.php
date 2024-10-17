@extends('teacher.Components.Layout')
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
                                        data-bs-toggle="modal" data-bs-target="#inputKategoriUjian">
                                        <i class="ni ni-fat-add"></i>
                                        <span class="ms-2">Buat Kategori Ujian</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Operator Account -->

        <!-- View Kategori Ujian -->
        <div class="container-fluid py-4">
            <div class="main-content position-relative max-height-vh-100 h-100">
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Data Kategori Ujian</h5>
                                </div>
                                <div class="card-body">
                                    @if ($categories->isEmpty())
                                        <p class="text-center">Tidak ada kategori ujian yang ditemukan.</p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table align-items-center">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Nama Kategori</th>
                                                        <th class="text-center">Deskripsi</th>
                                                        <th class="text-center">Tanggal Ujian</th>
                                                        <th class="text-center">Waktu Ujian</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $key => $category)
                                                        <tr>
                                                            <td class="text-center">{{ $key + 1 }}</td>
                                                            <td class="text-center">{{ $category->nama_kategori }}</td>
                                                            <td class="text-center">{{ $category->deskripsi }}</td>
                                                            <td class="text-center">{{ $category->tanggal_ujian }}</td>
                                                            <td class="text-center">{{ $category->waktu_ujian }}</td>
                                                            <td class="text-center">

                                                                <form
                                                                    action="{{ route('categories.destroy', $category->id) }}"
                                                                    method="POST" style="display:inline;"
                                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-xs">Hapus</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('teacher.Components.Footer')
                </div>
            </div>

            @include('administrator.Components.Footer')
        </div>
        <!-- End View Kategori Ujian -->

        <!-- Modal Input Kategori Ujian -->
        <div class="modal fade" id="inputKategoriUjian" tabindex="-1" role="dialog"
            aria-labelledby="inputKategoriUjianLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="inputKategoriUjianLabel">Buat Kategori Ujian</h5>
                    </div>
                    <div class="modal-body">
                        <form id="formInputKategoriUjian" action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                    maxlength="100" placeholder="Masukkan nama kategori" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi" rows="3" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_ujian">Tanggal Ujian</label>
                                <input type="date" class="form-control" id="tanggal_ujian" name="tanggal_ujian" required>
                            </div>

                            <div class="form-group">
                                <label for="waktu_ujian">Waktu Ujian</label>
                                <input type="time" class="form-control" id="waktu_ujian" name="waktu_ujian" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-round bg-gradient-warning"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-round bg-gradient-info"
                                    form="formInputKategoriUjian">Simpan
                                    Kategori</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal Input Kategori Ujian -->



        <!-- Alert Notification for Teacher Actions -->
        <script>
            window.onload = function() {
                @if (session('classroomImportSuccess'))
                    var importNotificationModal = new bootstrap.Modal(document.getElementById('classroomImportSuccess'));
                    importNotificationModal.show();
                @endif

                @if (session('classroomDestroySuccess'))
                    var deleteNotificationModal = new bootstrap.Modal(document.getElementById('classroomDestroySuccess'));
                    deleteNotificationModal.show();
                @endif
            };
        </script>
        <!-- End of Notification Script -->

        <!-- Modal Notification Data Guru Berhasil Ditambahkan -->
        <div class="modal fade" id="classroomImportSuccess" tabindex="-1" role="dialog"
            aria-labelledby="classroomImportSuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="classroomImportSuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('classroomImportSuccess') }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-round bg-gradient-info" data-bs-dismiss="modal">Ok,
                            Mengerti</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Notification Data Guru Berhasil Ditambahkan -->

        <!-- Modal Notification Data Guru Berhasil Dihapus -->
        <div class="modal fade" id="classroomDestroySuccess" tabindex="-1" role="dialog"
            aria-labelledby="classroomDestroySuccessLabel" aria-hidden="true">
            <div class="modal-dialog modal-success modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="classroomDestroySuccessLabel">Success</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="py-3 text-center">
                            <i class="ni ni-check-bold text-success ni-3x"></i>
                            <h4 class="text-gradient text-success mt-4">Berhasil!</h4>
                            <p>{{ session('classroomDestroySuccess') }}</p>
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
