<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2>Daftar Data Pengguna</h2>
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
                    <a href="pengguna/tambah" class="btn btn-info btn-icon-split btn-sm float-right">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data Pengguna</span></a>
                    <table class="table is-narrow" id="tabelpengguna">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">E-MAIL</th>
                                <th scope="col">NO TELEPON</th>
                                <th scope="col">PASSWORD</th>
                                <th scope="col">LEVEL</th>
                                <th scope="col">FOTO</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pengguna as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['email']; ?></td>
                                    <td><?= $p['no_hp']; ?></td>
                                    <td><?= $p['password']; ?></td>
                                    <td><?php if ($p['level'] == 1) {
                                            echo 'Administrator';
                                        } else {
                                            echo 'Pemeriksa';
                                        } ?></td>
                                    <td><img src="<?= base_url('img/' . $p['foto']); ?>" width="50px"></td>
                                    <td>
                                        <form action="/pengguna/ubah/<?= $p['id']; ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="ubah">
                                            <button type="submit" class="btn btn-warning btn-sm">Ubah</button>
                                        </form>
                                        <form action="/pengguna/hapus/<?= $p['id']; ?>" method="post" class="d-inline">
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