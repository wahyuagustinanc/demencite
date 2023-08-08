<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 align="center">HASIL PENILAIAN MINI-MENTAL STATE EXAM (MMSE) DEMENSIA</h4>
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-danger btn-sm" href="/penilaian/dokumentasi" role="button">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali</span>
                    </a>
                    <a class="btn btn-primary btn-sm" href="" role="button" onclick="window.print()">
                        <span class="icon text-white-50">
                            <i class="fas fa-print"></i>
                        </span>
                        <span class="text">Cetak</span>
                    </a>
                    <br>
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-for m-label">Tanggal</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" value="<?= $detail['tanggal'] ?>" readonly>
                        </div>
                        <label class="col-sm-2 col-for m-label">Pasien</label>
                        <div class="col-sm">
                            <input type="text" class="form-control" value="<?= $detail['nama'] ?>" readonly>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-sm-2 col-for m-label">Pemeriksa</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?= $detail['nama_pemeriksa'] ?>" readonly>
                        </div>
                    </div>
                    <br>
                    <div style="border : solid 2px; padding: 15px;">
                        <table>
                            <?= '<b>DATA PASIEN : </b><br>' ?>
                            <tr>
                                <td width="20%"><?= 'Nama' ?></td>
                                <td width="30%"><?= ': ' ?><?= $detail['nama'] ?></td>
                                <td width="20%"><?= 'Pendidikan terakhir' ?></td>
                                <td width="30%"><?= ': ' ?><?= $detail['pendidikan'] ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><?= 'Jenis kelamin' ?></td>
                                <td width="30%"><?= ': ' ?><?= $detail['jenis_kelamin'] ?></td>
                                <td width="20%"><?= 'Pekerjaan' ?></td>
                                <td width="30%"><?= ': ' ?><?= $detail['pekerjaan'] ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><?= 'Umur' ?></td>
                                <td width="30%"><?= ': ' ?><?= $detail['umur'] . 'tahun' ?></td>
                                <td width="20%"><?= 'Riwayat penyakit' ?></td>
                                <td width="30%"><?= ': ' ?><?= $detail['riwayat_penyakit'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <div style="border : solid 2px; padding: 15px;">
                        <?php if ($detail['pendidikan'] == 'Tidak sekolah' or $detail['pendidikan'] == 'SD') {
                            if ($detail['total'] >= 18) {
                                $detail['kondisi'] = '<b>NORMAL</b>';
                                echo '<b>KESIMPULAN : </b><br>';
                                echo 'Pasien atas nama ' . $detail['nama'] . ' mendapatkan skor ' . $detail['total'] . ' dan dinyatakan ' . $detail['kondisi'] . '.';
                            } elseif ($detail['total'] >= 0) {
                                $detail['kondisi'] = '<b>GANGGUAN KOGNITIF DEMENSIA</b>';
                                echo '<b>KESIMPULAN : </b><br>';
                                echo 'Pasien atas nama ' . $detail['nama'] . ' mendapatkan skor ' . $detail['total'] . ' dan dinyatakan ' . $detail['kondisi'] . '.';
                            };
                        } elseif ($detail['pendidikan'] == 'SMP') {
                            if ($detail['total'] >= 20) {
                                $detail['kondisi'] = '<b>NORMAL</b>';
                                echo '<b>KESIMPULAN : </b><br>';
                                echo 'Pasien atas nama ' . $detail['nama'] . ' mendapatkan skor ' . $detail['total'] . ' dan dinyatakan ' . $detail['kondisi'] . '.';
                            } elseif ($detail['total'] >= 0) {
                                $detail['kondisi'] = '<b>GANGGUAN KOGNITIF DEMENSIA</b>';
                                echo '<b>KESIMPULAN : </b><br>';
                                echo 'Pasien atas nama ' . $detail['nama'] . ' mendapatkan skor ' . $detail['total'] . ' dan dinyatakan ' . $detail['kondisi'] . '.';
                            };
                        } else {
                            if ($detail['total'] >= 23) {
                                $detail['kondisi'] = '<b>NORMAL</b>';
                                echo '<b>KESIMPULAN : </b><br>';
                                echo 'Pasien atas nama ' . $detail['nama'] . ' mendapatkan skor ' . $detail['total'] . ' dan dinyatakan ' . $detail['kondisi'] . '.';
                            } elseif ($detail['total'] >= 0) {
                                $detail['kondisi'] = '<b>GANGGUAN KOGNITIF DEMENSIA</b>';
                                echo '<b>KESIMPULAN : </b><br>';
                                echo 'Pasien atas nama ' . $detail['nama'] . ' mendapatkan skor ' . $detail['total'] . ' dan dinyatakan ' . $detail['kondisi'] . '.';
                            };
                        } ?>
                    </div>
                    <br>
                    <div style="border : solid 2px; padding: 15px;">
                        <?= '<b>HASIL PEMERIKSAAN : </b><br><br>' ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                    <th scope="col">Item</th>
                                    <th scope="col">Test</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><b>ORIENTASI</b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">1</td>
                                    <td>
                                        ORIENTASI WAKTU : <br>
                                        a. Tahun berapakah sekarang?<br>
                                        b. Musim apakah sekarang?<br>
                                        c. Bulan apakah sekarang?<br>
                                        d. Tanggal berapakah sekarang?<br>
                                        e. Hari apa sekarang?
                                    </td>
                                    <td><?= $detail['orientasi_waktu']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center">2</td>
                                    <td>
                                        ORIENTASI TEMPAT : <br>
                                        a. Kita berada di negara apa?<br>
                                        b. Kita berada di provinsi apa?<br>
                                        c. Kita berada di kota apa?<br>
                                        d. Kita berada di tempat apa? <br>
                                        e. Kita berada di lantai/kamar apa?
                                    </td>
                                    <td><?= $detail['orientasi_tempat']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>REGISTRASI</b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">3</td>
                                    <td>Sebutkan dan ulangi 3 nama benda : (<b>jeruk, uang, mawar</b>)<br>
                                        Aturan : waktu menyebutkan tiap benda 1 detik, berikan nilai 1 apabila pasien
                                        menyebutkan dengan benar</td>
                                    <td><?= $detail['registrasi']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>ATENSI DAN KALKULASI</b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">4</td>
                                    <td>
                                        Pilih salah satu pertanyaan : hitung atau mengeja kata secara terbalik <br>
                                        <u>Hitung</u> : 100-7 = ? - 7 = ? - 7 = ? - 7 = ? - 7 = ? (100 - 7 sampai 5
                                        kali)<br>
                                        <u>Eja kata secara terbalik</u> : WAHYU <br>
                                        (jawaban : U - Y - H - A - W)
                                    </td>
                                    <td><?= $detail['atensi_kalkulus']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>MENGINGAT KEMBALI (<i>RECALL</i>)</b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td>Pasien disuruh menyebutkan kembali 3 nama benda di atas</td>
                                    <td><?= $detail['recall']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>BAHASA</b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">6</td>
                                    <td>Pasien diminta menyebutkan nama benda yang ditunjukkan : pensil, arloji <br>
                                        (berdasarkan alat yang telah disiapkan)</td>
                                    <td><?= $detail['bahasa_benda']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center">7</td>
                                    <td>Pasien diminta mengulang rangkaian kata: "tanpa kalau dan atau tetapi"</td>
                                    <td><?= $detail['bahasa_kata']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center">8</td>
                                    <td>Pasien diminta melakukan perintah: <br>
                                        "Ambil kertas ini dengan tangan kanan,
                                        lipatlah menjadi dua dan letakkan di lantai"</td>
                                    <td><?= $detail['bahasa_perintah']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center">9</td>
                                    <td>Pasien diminta membaca dan melakukan perintah: <br>
                                        "Angkatlah tangan kiri anda"</td>
                                    <td><?= $detail['bahasa_perintah2']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center">10</td>
                                    <td>
                                        Pasien diminta menulis sebuah kalimat (spontan)<br>
                                        (sebutkan kalimat secara spontan)
                                    </td>
                                    <td><?= $detail['bahasa_tulis']; ?></td>
                                </tr>
                                <tr>
                                    <td align="center">11</td>
                                    <td>Pasien diminta meniru gambar <br> <img src="/img/mmse.png"></td>
                                    <td><?= $detail['bahasa_gambar']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right"><b>SKOR TOTAL</b></td>
                                    <td><b><?= $detail['total']; ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>
                        <div>
                            <div style="width:250px;float:right">
                                Pemeriksa
                                <br><br><br><br>
                                <p><?= $detail['nama_pemeriksa']; ?></p>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>