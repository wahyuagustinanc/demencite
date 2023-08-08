<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="col-lg mb">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
                Selamat datang, <?= session()->get('nama'); ?>!<br>
                Kamu berada di <b>Halaman <?php if (session()->get('level') == 1) {
                                                echo 'Administrator';
                                            } else {
                                                echo 'Pemeriksa';
                                            } ?></b>.
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Jumlah Dokumentasi Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Dokumentasi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $penilaian; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-laptop fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pasien Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pasien; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pemeriksa Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pemeriksa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pemeriksa; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumlah Pengguna Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pengguna</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengguna; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHART -->
    <div class="row">
        <!-- Chart Pendidikan -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Pasien - Pendidikan terakhir</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="chartpendidikan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Jenis Kelamin -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info">Pasien - Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="chartJK"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Laki-laki
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Perempuan
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hitung data -->
<?php foreach ($pas as $key) {
    $db = \Config\Database::connect();
    $jk_l = $db->table('pasien')
        ->where('jenis_kelamin', 'Laki-laki')
        ->countAllResults();
    $jk_p = $db->table('pasien')
        ->where('jenis_kelamin', 'Perempuan')
        ->countAllResults();
    $tidak_sekolah = $db->table('pasien')
        ->where('pendidikan', 'Tidak Sekolah')
        ->countAllResults();
    $sd = $db->table('pasien')
        ->where('pendidikan', 'SD')
        ->countAllResults();
    $smp = $db->table('pasien')
        ->where('pendidikan', 'SMP')
        ->countAllResults();
    $sma = $db->table('pasien')
        ->where('pendidikan', 'SMA/SMK')
        ->countAllResults();
    $d1 = $db->table('pasien')
        ->where('pendidikan', 'D1')
        ->countAllResults();
    $d2 = $db->table('pasien')
        ->where('pendidikan', 'D2')
        ->countAllResults();
    $d3 = $db->table('pasien')
        ->where('pendidikan', 'D3')
        ->countAllResults();
    $d4 = $db->table('pasien')
        ->where('pendidikan', 'D4')
        ->countAllResults();
    $s1 = $db->table('pasien')
        ->where('pendidikan', 'S1')
        ->countAllResults();
    $s2 = $db->table('pasien')
        ->where('pendidikan', 'S2')
        ->countAllResults();
    $s3 = $db->table('pasien')
        ->where('pendidikan', 'S3')
        ->countAllResults();
} ?>

<script src="<?= base_url() ?>/vendor/chart.js/Chart.min.js"></script>

<!-- chart jenis kelamin -->
<script>
    var ctx = document.getElementById("chartJK");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                data: [<?= $jk_l; ?>, <?= $jk_p; ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>

<!-- chart pendidikan terakhir -->
<script>
    var ctx = document.getElementById('chartpendidikan');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tidak sekolah', 'SD', 'SMP', 'SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'],
            datasets: [{
                label: 'Jumlah',
                data: [<?= $tidak_sekolah; ?>, <?= $sd; ?>, <?= $smp; ?>, <?= $sma; ?>, <?= $d1; ?>,
                    <?= $d2; ?>, <?= $d3; ?>, <?= $d4; ?>, <?= $s1; ?>,
                    <?= $s2; ?>, <?= $s3; ?>
                ],
                backgroundColor: [
                    '#4e73df', '#4e73df', '#4e73df', '#4e73df', '#4e73df', '#4e73df', '#4e73df',
                    '#4e73df', '#4e73df', '#4e73df', '#4e73df'
                ],
                borderColor: [
                    '#4e73df', '#4e73df', '#4e73df', '#4e73df', '#4e73df', '#4e73df', '#4e73df',
                    '#4e73df', '#4e73df', '#4e73df', '#4e73df'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false,
                }
            }
        }
    });
</script>

<?= $this->endSection(); ?>