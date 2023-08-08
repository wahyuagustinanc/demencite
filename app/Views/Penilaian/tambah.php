<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h4 align="center">PENILAIAN MINI-MENTAL STATE EXAM (MMSE) DEMENSIA</h4><br>
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
            <form action="/penilaian/simpan" method="post" name="autoSumForm">
                <?= csrf_field(); ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2 row">
                                <label for="nama_pemeriksa" class="col-sm-2 col-for m-label">Pemeriksa</label>
                                <div class="col-sm">
                                    <input type="text" class="form-control" name="nama_pemeriksa" value="<?= session()->get('nama') ?>" readonly>
                                </div>
                                <label for="id_pasien" class="col-sm-2 col-for m-label">Pasien</label>
                                <div class="col-sm">
                                    <select name="id_pasien" id="id_pasien" class="form-control" id="theSelect" required>
                                        <option value="" hidden></option>
                                        <?php foreach ($pasien as $key => $value) : ?>
                                            <option value="<?= $value['id_pasien'] ?>"><?= $value['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="tanggal" class="col-sm-2 col-for m-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tanggal" id="tanggal" value="<?= date('d-m-Y') ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p style="margin-left: 20px;">
                            <b>Alat bantu periksa : </b><br>
                            Siapkan kertas kosong, 2 benda (misal : pensil, arloji), dan tulisan yang harus dibaca. <br>
                            <b>Aturan : </b><br>
                            Tiap jawaban yang benar pada tiap item pertanyaan, berikan nilai 1.
                        </p>

                        <table class="table table-bordered">
                            <thead>
                                <tr align="center">
                                    <th scope="col">Item</th>
                                    <th scope="col">Test</th>
                                    <th scope="col">Nilai Maks</th>
                                    <th scope="col">Input Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td><b>ORIENTASI</b></td>
                                    <td></td>
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
                                    <td align="center">5</td>
                                    <td><input type="number" min="0" max="5" class="form-control" name="orientasi_waktu" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('orientasi_waktu'); ?>"></td>
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
                                    <td align="center">5</td>
                                    <td><input type="number" min="0" max="5" class="form-control" name="orientasi_tempat" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('orientasi_tempat'); ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>REGISTRASI</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">3</td>
                                    <td>Sebutkan dan ulangi 3 nama benda : (<b>jeruk, uang, mawar</b>)<br>
                                        Aturan : waktu menyebutkan tiap benda 1 detik, berikan nilai 1 apabila pasien
                                        menyebutkan dengan benar
                                    </td>
                                    <td align="center">3</td>
                                    <td><input type="number" min="0" max="3" class="form-control" name="registrasi" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('registrasi'); ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>ATENSI DAN KALKULASI</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">4</td>
                                    <td>
                                        Pilih salah satu pertanyaan : hitung atau mengeja kata secara terbalik <br>
                                        <u>Hitung</u> : 100-7 = ? - 7 = ? - 7 = ? - 7 = ? - 7 = ? (100 - 7 sampai 5
                                        kali)<br>
                                        100-7 = (jawaban 93) <br>
                                        93-7 = (jawaban 86) <br>
                                        86-7 = (jawaban 79) <br>
                                        79-7 = (jawaban 72) <br>
                                        72-7 = (jawaban 65) <br>
                                        <u>Eja kata secara terbalik</u> : WAHYU <br>
                                        (jawaban : U - Y - H - A - W)
                                    </td>
                                    <td align="center">5</td>
                                    <td><input type="number" min="0" max="5" class="form-control" name="atensi_kalkulus" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('atensi_kalkulus'); ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>MENGINGAT KEMBALI (<i>RECALL</i>)</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">5</td>
                                    <td>Pasien disuruh menyebutkan kembali 3 nama benda di atas</td>
                                    <td align="center">3</td>
                                    <td><input type="number" min="0" max="3" class="form-control" name="recall" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('recall'); ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>BAHASA</b></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td align="center">6</td>
                                    <td>Pasien diminta menyebutkan nama benda yang ditunjukkan : pensil, arloji <br>
                                        (berdasarkan alat yang telah disiapkan)</td>
                                    <td align="center">2</td>
                                    <td><input type="number" min="0" max="2" class="form-control" name="bahasa_benda" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('bahasa_benda'); ?>"></td>
                                </tr>
                                <tr>
                                    <td align="center">7</td>
                                    <td>Pasien diminta mengulang rangkaian kata: "tanpa kalau dan atau tetapi"</td>
                                    <td align="center">1</td>
                                    <td><input type="number" min="0" max="1" class="form-control" name="bahasa_kata" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('bahasa_kata'); ?>"></td>
                                </tr>
                                <tr>
                                    <td align="center">8</td>
                                    <td>Pasien diminta melakukan perintah: <br>
                                        "Ambil kertas ini dengan tangan kanan, lipatlah menjadi dua dan letakkan di
                                        lantai"
                                    </td>
                                    <td align="center">3</td>
                                    <td><input type="number" min="0" max="3" class="form-control" name="bahasa_perintah" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('bahasa_perintah'); ?>"></td>
                                </tr>
                                <tr>
                                    <td align="center">9</td>
                                    <td>Pasien diminta membaca dan melakukan perintah: <br>
                                        "Angkatlah tangan kiri anda"
                                    </td>
                                    <td align="center">1</td>
                                    <td><input type="number" min="0" max="1" class="form-control" name="bahasa_perintah2" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('bahasa_perintah2'); ?>"></td>
                                </tr>
                                <tr>
                                    <td align="center">10</td>
                                    <td>
                                        Pasien diminta menulis sebuah kalimat <br>
                                        (sebutkan kalimat secara spontan)
                                    </td>
                                    <td align="center">1</td>
                                    <td><input type="number" min="0" max="1" class="form-control" name="bahasa_tulis" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('bahasa_tulis'); ?>"></td>
                                </tr>
                                <tr>
                                    <td align="center">11</td>
                                    <td>Pasien diminta meniru gambar <br> <img src="/img/mmse.png"></td>
                                    <td align="center">1</td>
                                    <td><input type="number" min="0" max="1" class="form-control" name="bahasa_gambar" onFocus="startCalc();" onBlur="stopCalc();" value="<?= old('bahasa_gambar'); ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right"><b>SKOR TOTAL</b></td>
                                    <td align="center"><b>30</b></td>
                                    <td align="center"><input type="text" class="form-control" name="total" id="total" value="0" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-danger" href="/penilaian" role="button">Kembali</a>
                <a class="btn btn-info" href="/penilaian/tambah" role="button">Ulangi</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>

            <!-- Menghitung otomatis skor -->
            <script>
                function startCalc() {
                    interval = setInterval("calc()", 1);
                }

                function calc() {
                    orientasi_waktu = document.autoSumForm.orientasi_waktu.value;
                    orientasi_tempat = document.autoSumForm.orientasi_tempat.value;
                    registrasi = document.autoSumForm.registrasi.value;
                    atensi_kalkulus = document.autoSumForm.atensi_kalkulus.value;
                    recall = document.autoSumForm.recall.value;
                    bahasa_benda = document.autoSumForm.bahasa_benda.value;
                    bahasa_kata = document.autoSumForm.bahasa_kata.value;
                    bahasa_perintah = document.autoSumForm.bahasa_perintah.value;
                    bahasa_perintah2 = document.autoSumForm.bahasa_perintah2.value;
                    bahasa_tulis = document.autoSumForm.bahasa_tulis.value;
                    bahasa_gambar = document.autoSumForm.bahasa_gambar.value;
                    document.autoSumForm.total.value = (orientasi_waktu * 1) + (orientasi_tempat * 1) +
                        (registrasi * 1) + (atensi_kalkulus * 1) + (recall * 1) +
                        (bahasa_benda * 1) + (bahasa_kata * 1) + (bahasa_perintah * 1) +
                        (bahasa_perintah2 * 1) + (bahasa_tulis * 1) + (bahasa_gambar * 1);
                }

                function stopCalc() {
                    clearInterval(interval);
                }
            </script>

            <!-- Search pada select -->
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#id_pasien').select2({
                        placeholder: 'Pilih pasien',
                        allowClear: true
                    });
                });
            </script>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>