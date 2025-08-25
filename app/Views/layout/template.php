<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/modules/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/modules/fontawesome/css/all.min.css') ?>">

    <!-- CSS Libraries -->
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components.css') ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [{
                        title: 'Contoh Event',
                        start: '2025-04-14'
                    },
                    {
                        title: 'Meeting',
                        start: '2025-04-17',
                        end: '2025-04-19'
                    }
                ]
            });

            calendar.render();
        });
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="/users/profile" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <?php
                            $foto = session()->get('foto_profile');
                            $src = $foto ? base_url('uploads/profile/' . $foto) : base_url('assets/img/avatar/avatar-1.png');
                            ?>
                            <img alt="image" src="<?= $src ?>" class="rounded-circle mr-1">


                            <div class="d-sm-none d-lg-inline-block">Hi, <?= session()->get('username'); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="/user/profile" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/logout" class="dropdown-item has-icon text-danger confirm-logout">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">ToDo-List</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">TL</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown">
                            <a href="/home" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

                        </li>
                        <li class="menu-header">Halaman</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kategori</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/task/kategori/hiburan">Hiburan</a></li>
                                <li><a class="nav-link" href="/task/kategori/pribadi">Pribadi</a></li>
                                <li><a class="nav-link" href="/task/kategori/pekerjaan">Pekerjaan</a></li>
                            </ul>
                        </li>
                        <li class=""><a class="nav-link" href="/task/calendar"><i class="far fa-square"></i> <span>Calendar</span></a></li>

                        <li class="menu-header">Logout</li>
                        <li class="dropdown">
                            <a href="logout" class="nav-link confirm-logout"><i class="fas fa-th-large"></i> <span>Logout</span></a>

                        </li>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="section-body">
                        <?= $this->renderSection('content'); ?>
                    </div>
                </section>
            </div>


            <footer class="main-footer">
                <div class="footer-left">
                    
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/modules/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/modules/popper.js') ?>"></script>
    <script src="<?= base_url('assets/modules/tooltip.js') ?>"></script>
    <script src="<?= base_url('assets/modules/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
    <script src="<?= base_url('assets/modules/nicescroll/jquery.nicescroll.min.js') ?>x"></script>
    <script src="<?= base_url('assets/js/stisla.js') ?>"></script>

    <!-- JS Libraies -->
    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page Specific JS File -->
    <script>
        //sweet alert berhasil
        $(function() {
            <?php if (session()->has('berhasil')) { ?>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "<?= $_SESSION['berhasil'] ?>"
                });
            <?php } ?>
        })

        //sweet alert konfirmasi hapus
        $('.tombol-hapus').on('click', function() {
            var getLink = $(this).attr('href');

            Swal.fire({
                title: "Yakin hapus?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            });
            return false;
        });

        //sweet alert konfirmasi logout
        $('.confirm-logout').on('click', function() {
            var getLink = $(this).attr('href');

            Swal.fire({
                title: "Yakin Ingin Logout?",
                text: "Setelah keluar anda harus Login kembali.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Keluar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            });
            return false;
        });

        //swal untuk berhasil check tugas
        <?php if (session()->getFlashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success'); ?>',
                confirmButtonText: 'OK'
            });
        <?php endif; ?>
    </script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>
    <!-- Bootstrap JS dan Popper -->

</body>

</html>