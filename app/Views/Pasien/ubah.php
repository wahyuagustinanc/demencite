<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Form Ubah Data Pasien</h2>
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
            <form action="<?= base_url('pasien/perbarui/' . $pasien['id_pasien']) ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= $pasien['nama']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                            <option selected disabled hidden> </option>
                            <option value="Laki-laki" <?= ($pasien['jenis_kelamin'] == "Laki-laki" ? "selected" : ""); ?>>Laki-laki</option>
                            <option value="Perempuan" <?= ($pasien['jenis_kelamin'] == "Perempuan" ? "selected" : ""); ?>>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $pasien['tgl_lahir']; ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="umur" class="col-sm-2 col-form-label">Umur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="umur" name="umur" value="<?= $pasien['umur']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pendidikan" class="col-sm-2 col-form-label">Pendidikan terakhir</label>
                    <div class="col-sm-10">
                        <select name="pendidikan" value="<?= old('pendidikan'); ?>" class="form-control">
                            <option selected disabled hidden> </option>
                            <option value="Tidak Sekolah" <?= ($pasien['pendidikan'] == "Tidak sekolah" ? "selected" : ""); ?>>Tidak Sekolah
                            </option>
                            <option value="SD" <?= ($pasien['pendidikan'] == "SD" ? "selected" : ""); ?>>SD</option>
                            <option value="SMP" <?= ($pasien['pendidikan'] == "SMP" ? "selected" : ""); ?>>SMP</option>
                            <option value="SMA/SMK" <?= ($pasien['pendidikan'] == "SMA/SMK" ? "selected" : ""); ?>>
                                SMA/SMK</option>
                            <option value="D1" <?= ($pasien['pendidikan'] == "D1" ? "selected" : ""); ?>>D1</option>
                            <option value="D2" <?= ($pasien['pendidikan'] == "D2" ? "selected" : ""); ?>>D2</option>
                            <option value="D3" <?= ($pasien['pendidikan'] == "D3" ? "selected" : ""); ?>>D3</option>
                            <option value="D4" <?= ($pasien['pendidikan'] == "D4" ? "selected" : ""); ?>>D4</option>
                            <option value="S1" <?= ($pasien['pendidikan'] == "S1" ? "selected" : ""); ?>>S1</option>
                            <option value="S2" <?= ($pasien['pendidikan'] == "S2" ? "selected" : ""); ?>>S2</option>
                            <option value="S3" <?= ($pasien['pendidikan'] == "S3" ? "selected" : ""); ?>>S3</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pasien['pekerjaan']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="riwayat_penyakit" class="col-sm-2 col-form-label">Riwayat Penyakit</label>
                    <div class="col-sm-10">
                        <select name="riwayat_penyakit" value="<?= old('riwayat_penyakit'); ?>" class="form-control">
                            <option selected disabled hidden> </option>
                            <option value="Tidak ada" <?= ($pasien['riwayat_penyakit'] == "Tidak ada" ? "selected" : ""); ?>>Tidak ada
                            </option>
                            <option value="Stroke" <?= ($pasien['riwayat_penyakit'] == "Stroke" ? "selected" : ""); ?>>
                                Stroke</option>
                            <option value="Diabetes Melitus" <?= ($pasien['riwayat_penyakit'] == "Diabetes Melitus" ? "selected" : ""); ?>>Diabetes
                                Melitus</option>
                            <option value="Hipertensi" <?= ($pasien['riwayat_penyakit'] == "Hipertensi" ? "selected" : ""); ?>>Hipertensi
                            </option>
                            <option value="Penyakit jantung" <?= ($pasien['riwayat_penyakit'] == "Penyakit jantung" ? "selected" : ""); ?>>Penyakit
                                jantung</option>
                            <option value="Dll" <?= ($pasien['riwayat_penyakit'] == "Dll" ? "selected" : ""); ?>>Dll
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 bg-light text-right">
                    <a class="btn btn-danger" href="/pasien" role="button">Kembali</a>
                    <button type="submit" class="btn btn-success">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>