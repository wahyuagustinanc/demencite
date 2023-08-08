<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url() ?>/css/jquery-ui.css" rel="stylesheet">

    <!-- CSS Search Select Option Pasien -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

    <!-- Print/Save ke pdf -->
    <style>
    @media print {

        .navbar-nav,
        .btn,
        footer,
        a#debug-icon-link {
            display: none;
        }
    }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"">
    <div class=" sidebar-brand-icon">
                <i class="fas fa-medkit"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Demencite</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item <?= $menu == 'home' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (session()->get('level') == 1) { ?>
    <li class="nav-item <?= $menu == 'penilaian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('penilaian'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Lembar Penilaian</span>
        </a>
    </li>
    <li class="nav-item <?= $menu == 'data' ? 'active' : '' ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse <?= $menu == 'data' ? 'show' : '' ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $submenu == 'datapasien' ? 'active' : '' ?>"
                    href="<?= base_url('pasien'); ?>">Data Pasien</a>
                <a class="collapse-item <?= $submenu == 'datapemeriksa' ? 'active' : '' ?>"
                    href="<?= base_url('pemeriksa'); ?>">Data Pemeriksa</a>
                <a class="collapse-item <?= $submenu == 'datapengguna' ? 'active' : '' ?>"
                    href="<?= base_url('pengguna'); ?>">Data Pengguna</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?= $menu == 'dokumentasi' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('penilaian/dokumentasi'); ?>">
            <i class="fa fa-bookmark"></i>
            <span>Dokumentasi</span>
        </a>
    </li>
    <?php } ?>

    <?php if (session()->get('level') == 2) { ?>
    <li class="nav-item <?= $menu == 'penilaian' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('penilaian'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Lembar Penilaian</span>
        </a>
    </li>
    <li class="nav-item <?= $menu == 'data' ? 'active' : '' ?>">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse <?= $menu == 'data' ? 'show' : '' ?>" aria-labelledby="headingTwo"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?= $submenu == 'datapasien' ? 'active' : '' ?>"
                    href="<?= base_url('pasien'); ?>">Data Pasien</a>
                <a class="collapse-item <?= $submenu == 'datapemeriksa' ? 'active' : '' ?>"
                    href="<?= base_url('pemeriksa'); ?>">Data Pemeriksa</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?= $menu == 'dokumentasi' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('penilaian/dokumentasi'); ?>">
            <i class="fa fa-bookmark"></i>
            <span>Dokumentasi</span>
        </a>
    </li>
    <?php } ?>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><span
                                    class="hidden-xs"><?= session()->get('nama'); ?></span></span>
                            <img class="img-profile rounded-circle"
                                src="<?= base_url('img/' . session()->get('foto')) ?>"
                                class="img-thumbnail img-preview">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= base_url('profil') ?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- ISI KONTEN -->
            <?= $this->renderSection('content'); ?>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Pencatatan Hasil Pemeriksaan Demensia <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin mau Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika mau keluar dari sistem.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-info" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- My Script -->
    <script src="<?= base_url() ?>/assets/js/script.js"></script>

    <!-- Preview Foto Profil -->
    <script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const fotoLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        fotoLabel.textContent = foto.files[0].name;

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
    </script>

    <!-- JS DataTable -->
    <script src="<?= base_url() ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#tabelpengguna').DataTable();
        $('#tabelpemeriksa').DataTable();
        $('#tabelpasien').DataTable();
        $('#tabeldok').DataTable();
    });
    </script>

    <!-- Menghilangkan alert setelah beberapa detik -->
    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    </script>

    <!-- JS Search pada select option -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('select').selectize({
            sortField: 'text'
        });
    });
    </script>

    <!-- Datepicker -->
    <script src="<?= base_url() ?>/js/jquery-ui.js"></script>
    <!-- Menampilkan umur dari pengurangan pada tgl lahir -->
    <script>
    $(function() {
        $("#tgl_lahir").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
    });
    window.onload = function() {
        $('#tgl_lahir').on('change', function() {
            var dob = new Date(this.value);
            var today = new Date();
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#umur').val(age);
        });
    }
    </script>

</body>

</html>