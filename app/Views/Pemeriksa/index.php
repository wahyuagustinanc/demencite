<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Daftar Pemeriksa Demensia</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <a href="pemeriksa/tambah" class="btn btn-info btn-icon-split btn-sm float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Pemeriksa</span>
                    </a>
                    <table class="table is-narrow" id="tabelpemeriksa">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NIK</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">POSISI</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pemeriksa as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['nik']; ?></td>
                                    <td><?= $p['jenis_kelamin']; ?></td>
                                    <td><?= $p['posisi']; ?></td>
                                    <td>
                                        <form action="/pemeriksa/ubah/<?= $p['id_pemeriksa']; ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="ubah">
                                            <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                                        </form>
                                        <form action="/pemeriksa/hapus/<?= $p['id_pemeriksa']; ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="hapus">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>