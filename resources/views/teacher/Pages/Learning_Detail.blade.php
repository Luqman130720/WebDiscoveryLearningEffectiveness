@extends('Teacher.Components.Layout')
@section('Content')
    <div class="main-content position-relative max-height-vh-100 h-100">
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
                </div>
            </div>
        </div>



        <div class="container-fluid py-4">
            <div class="row">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Informasi Konten Pembelajaran</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="learningTitle" class="form-control-label">Judul
                                                Konten</label>
                                            <input class="form-control" id="learningTitle" type="text" name="title"
                                                value="{{ $content->judul_konten }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="learningCategory" class="form-control-label">Pengarang</label>
                                            <input class="form-control" id="learningCategory" type="text" name="category"
                                                value="{{ $content->pengarang }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="learningAuthor" class="form-control-label">Penerbit</label>
                                            <input class="form-control" id="learningAuthor" type="text" name="author"
                                                value="{{ $content->penerbit }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="learningDate" class="form-control-label">Tanggal
                                                Posting</label>
                                            <input class="form-control" id="learningDate" type="text" name="date"
                                                value="{{ $content->created_at->format('d/m/Y') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="learningStatus" class="form-control-label">Kelas</label>
                                            <input class="form-control" id="learningStatus" type="text" name="status"
                                                value="{{ $content->classroom->nama_kelas ?? 'Tidak ada kelas' }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Informasi Tambahan</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="learningDescription" class="form-control-label">Deskripsi</label>
                                            <textarea class="form-control" id="learningDescription" rows="4" readonly>{{ $content->deskripsi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-profile">
                            <img src="{{ asset('storage/' . ($content->cover ?? 'default-image.jpg')) }}"
                                alt="Image placeholder" class="card-img-top">
                            <div class="card-body d-flex justify-content-center align-items-center pt-0">
                                <div class="mt-4 text-center">
                                    <a href="{{ route('content.download', $content->id) }}"
                                        class="btn btn-round bg-gradient-info d-flex align-items-center">
                                        <i class="ni ni-cloud-download-95 me-2"></i>
                                        <span>Download File</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                @include('teacher.Components.Footer')
            </div>
        </div>
    @endsection
