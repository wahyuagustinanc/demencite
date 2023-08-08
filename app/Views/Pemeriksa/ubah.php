<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Ubah Data Pemeriksa</h2>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Entrian Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('pemeriksa/perbarui/' . $pemeriksa['id_pemeriksa']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= $pemeriksa['nama']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nik" name="nik" autofocus value="<?= $pemeriksa['nik']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                            <option selected disabled hidden> </option>
                            <option value="Laki-laki" <?= ($pemeriksa['jenis_kelamin'] == "Laki-laki" ? "selected" : ""); ?>>Laki-laki
                            </option>
                            <option value="Perempuan" <?= ($pemeriksa['jenis_kelamin'] == "Perempuan" ? "selected" : ""); ?>>Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $pemeriksa['posisi']; ?>">
                    </div>
                </div>
                <div class="col-md-12 bg-light text-right">
                    <a class="btn btn-danger" href="/pemeriksa" role="button">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>