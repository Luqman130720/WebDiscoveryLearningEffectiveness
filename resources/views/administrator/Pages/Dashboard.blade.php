@extends('administrator.Components.Layout')
@section('Content')
    <main class="main-content position-relative border-radius-lg ">

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Teachers</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $totalTeachers }} <!-- Tampilkan jumlah guru -->
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Students</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $totalStudents }} <!-- Tampilkan jumlah siswa -->
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Subjects</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $totalSubjects }} <!-- Tampilkan jumlah mata pelajaran -->
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Classrooms</p>
                                        <h5 class="font-weight-bolder">
                                            {{ $totalClassroom }} <!-- Tampilkan jumlah kelas -->
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div
                                        class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                        <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card z-index-2 h-100">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h6 class="text-capitalize">Overview of Data</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-arrow-up text-success"></i>
                                Data Overview for 2024
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-overview" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var ctx = document.getElementById('chart-overview').getContext('2d');
                    var chartOverview = new Chart(ctx, {
                        type: 'bar', // Anda bisa mengganti tipe chart ke 'line', 'pie', dll.
                        data: {
                            labels: ['Teachers', 'Students', 'Subjects', 'Classrooms'], // Label untuk setiap kategori data
                            datasets: [{
                                label: 'Count Overview',
                                data: [{{ $totalTeachers }}, {{ $totalStudents }}, {{ $totalSubjects }},
                                    {{ $totalClassroom }}
                                ], // Data yang diambil dari controller
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)', // Warna untuk Teachers
                                    'rgba(54, 162, 235, 0.2)', // Warna untuk Students
                                    'rgba(75, 192, 192, 0.2)', // Warna untuk Subjects
                                    'rgba(153, 102, 255, 0.2)' // Warna untuk Classrooms
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

                <div class="col-lg-5">
                    <div class="card card-carousel overflow-hidden h-100 p-0">
                        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                            <div class="carousel-inner border-radius-lg h-100">
                                <div class="carousel-item h-100 active"
                                    style="background-image: url({{ asset('https://www.globalcognition.org/wp-content/uploads/2013/05/discovery-learning.webp') }}); background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-camera-compact text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">"Temukan Jawaban Melalui Eksplorasi!"</h5>
                                        <p>"Belajar bukan hanya tentang mendapatkan jawaban, tapi tentang menemukan solusi
                                            melalui eksplorasi. Temukan pengetahuan baru dengan mencoba, mengamati, dan
                                            bereksperimen!"
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item h-100"
                                    style="background-image: url({{ asset('https://acerforeducation.id/wp-content/uploads/2022/04/6-Thumbnail-369x245-Discovery-Learning.jpg') }}); background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">"Belajar dengan Menemukan, Bukan Menghafal!"</h5>
                                        <p>"Metode Discovery Learning memungkinkan kita menemukan konsep dan pemahaman baru
                                            melalui pengalaman langsung. Mari belajar dengan rasa ingin tahu dan inovasi."
                                        </p>
                                    </div>
                                </div>
                                <div class="carousel-item h-100"
                                    style="background-image: url({{ asset('https://www.teflhongkong.com/blog/wp-content/uploads/2021/01/tm-discoverymethod.jpg') }}); background-size: cover;">
                                    <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                        <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                            <i class="ni ni-trophy text-dark opacity-10"></i>
                                        </div>
                                        <h5 class="text-white mb-1">"Jelajahi Dunia Pengetahuan dengan Discovery Learning!"
                                        </h5>
                                        <p>"Belajar adalah petualangan untuk menemukan hal-hal baru. Melalui Discovery
                                            Learning, kita diberi kebebasan untuk bertanya, mencoba, dan menemukan makna
                                            dari setiap pelajaran yang kita hadapi."
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next w-5 me-3" type="button"
                                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-7 mb-lg-0 mb-4">
                    <div class="card" style="max-height: 450px; overflow-y: auto;">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-2">Teachers Data</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $index => $teacher)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $teacher->nip }}</td>
                                            <td>{{ $teacher->nama }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Classrooms</h6>
                        </div>
                        <div class="card-body p-3" style="max-height: 400px; overflow-y: auto;">
                            <ul class="list-group">
                                @foreach ($classrooms as $classroom)
                                    <li
                                        class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                                <i class="ni ni-building text-white opacity-10"></i>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">{{ $classroom->nama_kelas }}</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button
                                                class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                                                <i class="ni ni-bold-right" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            @include('administrator.Components.Footer')
        </div>
    </main>
@endsection
