<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h2 align="center"><b>PROFIL ANDA</b></h2><br>
    <div class="row">
        <div class="col-4">
            <div class="card align-items-center" style="width: 20rem;" align="center">
                <img class="card-img-top" src="<?= base_url('img/' . session()->get('foto')) ?>" alt="Card image cap">
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('profil/ubah/' . session()->get('id')) ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="fotoLama" value="<?= session()->get('foto') ?>">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-2 col-for m-label">Nama</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama" value="<?= session()->get('nama') ?>" readonly>
                            </div>
                            <label for="email" class="col-sm-2 col-for m-label">E-mail</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="email" value="<?= session()->get('email') ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_hp" class="col-sm-2 col-for m-label">No Telepon</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="no_hp" value="<?= session()->get('no_hp') ?>" readonly>
                            </div>
                            <label for="password" class="col-sm-2 col-for m-label">Password</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="password" value="<?= session()->get('password') ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="level" class="col-sm-2 col-for m-label">Level</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="level" value="<?php if (session()->get(['level'] == 1)) {
                                                                                                echo 'Administrator';
                                                                                            } else {
                                                                                                echo 'Pemeriksa';
                                                                                            } ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-12 bg-light text-right">
                                <form action="/profil/ubah/<?= session()->get('id') ?>" method="post" class="d-inline">
                                    <input type="hidden" name="_method" value="ubah">
                                    <button type="submit" class="btn btn-warning">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>