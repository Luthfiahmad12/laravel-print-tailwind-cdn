<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('template/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('template/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js')}}"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="/admin/dashboard">
                        <img src="{{ asset('template/images/logo.svg') }}" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="../admin/index.php">
                        <img src="{{ asset('template/images/logo-mini.svg') }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">{{ $greeting }},<span class="text-black fw-bold">
                                {{ Auth::guard('admin')->user()->username }}</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{ asset('template/images/faces/face8.jpg') }}"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{ asset('template/images/faces/face8.jpg') }}"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::guard('admin')->user()->username }}
                                </p>
                            </div>
                            <a href="{{ route('LogoutAdmin') }}" class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/dashboard">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Data</li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/daftar-print">
                            <i class="mdi mdi-application menu-icon"></i>
                            <span class="menu-title">Daftar Print</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/daftar-user">
                            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                            <span class="menu-title">Daftar User</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">DANGER</li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('LogoutAdmin') }}">
                            <i class="menu-icon mdi mdi-alert-outline"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <canvas id="donutChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">FC FASTIKOM</h4>
                                    <ul class="list-arrow">
                                        <li>Jumlah Print Antri: {{ $data['antri'] }}</li>
                                        <li>Jumlah Print Proses: {{ $data['proses'] }}</li>
                                        <li>Jumlah Print Selesai: {{ $data['selesai'] }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a>
                            from BootstrapDash.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('template/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('template/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/js/template.js') }}"></script>
    <script src="{{ asset('template/js/settings.js') }}"></script>
    <script src="{{ asset('template/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('template/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('template/js/dashboard.js') }}"></script>
    <script src="{{ asset('template/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="{{ asset('template/js/chart.js') }}"></script>
    {{-- <script>
        var donutChart = new Chart(document.getElementById('donutChart'), {
            type: 'doughnut',
            data: {
                labels: ['Antri', 'Proses', 'Selesai'],
                datasets: [{
                    data: [<?php echo $pendingPercentage; ?>, <?php echo $processingPercentage; ?>, <?php echo $completedPercentage; ?>],
                    backgroundColor: ['#FF6384', '#FFCE56', '#36A2EB']
                }]
            },
            options: {
                responsive: true,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex,
                                array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                            return percentage + "%";
                        }
                    }
                }
            }
        });
    </script> --}}

    <script>
        var donutChart;

        // Fungsi untuk menginisialisasi chart
        function initializeChart() {
            var chartData = {
                labels: ['Antri', 'Proses', 'Selesai'],
                datasets: [{
                    data: [
                        {{ $pendingPercentage }},
                        {{ $processingPercentage }},
                        {{ $completedPercentage }}
                    ],
                    backgroundColor: ['#FF6384', '#FFCE56', '#36A2EB']
                }]
            };

            var chartOptions = {
                responsive: true,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex,
                                array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                            return percentage + "%";
                        }
                    }
                }
            };

            var chartElement = document.getElementById('donutChart');

            if ({{ $totalCount }} > 0) {
                donutChart = new Chart(chartElement, {
                    type: 'doughnut',
                    data: chartData,
                    options: chartOptions
                });
            } else {
                chartOptions["elements"] = {
                    center: {
                        text: 'No Data',
                        fontStyle: 'Arial',
                        sidePadding: 20
                    }
                };

                chartOptions["cutout"] = '70%';

                donutChart = new Chart(chartElement, {
                    type: 'doughnut',
                    data: {
                        labels: ['Tidak Ada Data'],
                        datasets: [{
                            data: [1],
                            backgroundColor: ['rgba(0, 0, 0, 0.7)']
                        }]
                    },
                    options: chartOptions
                });
            }
        }

        // Panggil fungsi untuk menginisialisasi chart saat halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", function(event) {
            initializeChart();
        });
    </script>



    <!-- End custom js for this page-->
</body>

</html>
