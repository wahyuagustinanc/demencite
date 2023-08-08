<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Daftar Pasien</h2>
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
                    <a href="pasien/tambah" class="btn btn-info btn-icon-split btn-sm float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Pasien</span>
                    </a>
                    <table class="table is-narrow" id="tabelpasien">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">UMUR</th>
                                <th scope="col">PENDIDIKAN</th>
                                <th scope="col">PEKERJAAN</th>
                                <th scope="col">RIWAYAT PENYAKIT</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pasien as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['jenis_kelamin']; ?></td>
                                <td><?= $p['umur']; ?></td>
                                <td><?= $p['pendidikan']; ?></td>
                                <td><?= $p['pekerjaan']; ?></td>
                                <td><?= $p['riwayat_penyakit']; ?></td>
                                <td>
                                    <form action="/pasien/ubah/<?= $p['id_pasien']; ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="ubah">
                                        <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                                    </form>
                                    <form action="/pasien/hapus/<?= $p['id_pasien']; ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="hapus">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
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