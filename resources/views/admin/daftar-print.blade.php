<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Print</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('template/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
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
                        <h1 class="welcome-text">{{ $greeting }} ,<span class="text-black fw-bold">
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
            <!-- partial:../../partials/_settings-panel.html -->
            <!-- Your settings panel content here -->
            <!-- partial -->
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
            <!-- Your sidebar content here -->
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
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Daftar Print</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><code>No</code></th>
                                                    <th>Nama User</th>
                                                    <th><code>Tipe</code></th>
                                                    <th>Berkas</th>
                                                    <th><code>Status</code></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->user->name }}</td>
                                                        <td>{{ ucwords(str_replace('_', ' ', $item->type)) }}</td>
                                                        <td>
                                                            <a href="{{ url('storage/uploads/' . $item->document) }}"
                                                                target="__blank">{{ $item->document }}
                                                                (Document)
                                                            </a><br><br>
                                                            <a href="{{ url('storage/uploads/lembar_bimbingan' . $item->lembar_bimbingan) }}"
                                                                target="__blank">{{ $item->document }}
                                                                (Lembar Bimbingan)
                                                            </a><br><br>
                                                            <a href="{{ url('storage/uploads/ttd_dospem' . $item->ttd_dospem) }}"
                                                                target="__blank">{{ $item->ttd_dospem }} (Ttd
                                                                Dosen)</a><br>
                                                            <hr>
                                                            @if (!empty($item->payment))
                                                                Bukti Bayar : <a
                                                                    href="{{ asset('storage/uploads/bukti_bayar/' . $item->payment->bukti_pembayaran) }}"
                                                                    target="blank">{{ $item->payment->bukti_pembayaran }}</a>
                                                            @else
                                                                Belum Ada Pembayaran
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->status == 'antri')
                                                                <label class="badge badge-danger">Antri</label>
                                                            @elseif($item->status == 'proses')
                                                                <label class="badge badge-warning">Proses</label>
                                                            @else
                                                                <label class="badge badge-success">Selesai</label>
                                                            @endif
                                                        </td>
                                                        @if ($item->status != 'selesai')
                                                            <td>
                                                                <select class="form-select"
                                                                    onchange="updateStatus(this.value, {{ $item->id }})">
                                                                    <option value="antri"
                                                                        {{ $item->status == 'antri' ? 'selected' : '' }}>
                                                                        Antri
                                                                    </option>
                                                                    <option value="proses"
                                                                        {{ $item->status == 'proses' ? 'selected' : '' }}>
                                                                        Proses</option>
                                                                    <option value="selesai"
                                                                        {{ $item->status == 'selesai' ? 'selected' : '' }}>
                                                                        Selesai</option>
                                                                </select>
                                                            </td>
                                                        @else
                                                            <td>-</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- Your footer content here -->
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
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('template/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/js/template.js') }}"></script>
    <script src="{{ asset('template/js/settings.js') }}"></script>
    <script src="{{ asset('template/js/todolist.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.js"></script>
    <!-- Your custom script here -->
    <script>
        function updateStatus(status, id) {
            // Menggunakan AJAX untuk mengirim permintaan pembaruan status ke server
            $.ajax({
                url: '{{ route('updateStatus') }}', // Gunakan helper route() untuk mendapatkan URL endpoint
                method: 'POST',
                data: {
                    status: status,
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Untuk proteksi CSRF di Laravel
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Status berhasil diperbarui',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload(); // Memuat ulang halaman setelah pemberitahuan ditutup
                    });
                },
                error: function(xhr, status, error) {
                    console.log(error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal memperbarui status',
                        text: 'Terjadi kesalahan saat memperbarui status.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    </script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>
