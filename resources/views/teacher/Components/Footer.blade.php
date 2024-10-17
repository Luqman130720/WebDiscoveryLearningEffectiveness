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
                                <a href="https://www.creative-tim.com" class="font-weight-bold"
                                    target="_blank">DiscoveryLearn</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="{{ route('teacher.dashboard') }}" class="nav-link text-muted"
                                        target="_blank">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teacher.virtual-classes') }}" class="nav-link text-muted"
                                        target="_blank">Klas Virtual</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teacher.learning-content') }}" class="nav-link text-muted"
                                        target="_blank">Konten Belajar</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('teacher.feedback.index') }}" class="nav-link pe-0 text-muted"
                                        target="_blank">Feedback</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
