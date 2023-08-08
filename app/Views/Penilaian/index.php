<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 align="center">Lembar Penilaian Demensia</h2><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-12 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= base_url('img/penilaian.png') ?>" alt="">
                <div class="card-body" align="center">
                    <h5 class="card-title"><b>LEMBAR PENILAIAN</b></h5>
                    <p class="card-text">Digunakan untuk mengakses lembar penilaian tes demensia menggunakan teknik MMSE</p>
                    <a href="penilaian/tambah" class="btn btn-info">Di sini</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?= base_url('img/dokumentasi.png') ?>" alt="">
                <div class="card-body" align="center">
                    <h5 class="card-title"><b>DOKUMENTASI</b></h5>
                    <p class="card-text">Digunakan untuk mengakses dokumentasi hasil penilaian demensia</p>
                    <a href="penilaian/dokumentasi" class="btn btn-info">Di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>