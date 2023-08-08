<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 align="center">DOKUMENTASI HASIL PENILAIAN MINI-MENTAL STATE EXAM (MMSE) DEMENSIA</h4><br>
            <div class="card">
                <div class="card-body">
                    <table class="table is-narrow" id="tabeldok">
                        <thead align="center">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA PASIEN</th>
                                <th scope="col">NAMA PEMERIKSA</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penilaian as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['nama_pemeriksa']; ?></td>
                                    <td><?= $p['tanggal']; ?></td>
                                    <td>
                                        <a href="/penilaian/detail/<?= $p['id_dokumentasi']; ?>" class="btn btn-success btn-sm">Detail</a>
                                        <form action="/penilaian/hapus/<?= $p['id_dokumentasi']; ?>" method="post" class="d-inline">
                                            <input type="hidden" name="_method" value="hapus">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
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