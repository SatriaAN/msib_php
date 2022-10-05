<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 2 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container px-5 my-5">
        <form id="contactForm" method="POST">
            <div class="mb-3">
                <label class="form-label" for="nama">Nama</label>
                <input class="form-control" name="nama" type="text" placeholder="Nama" data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="nama:required">Nama is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="agama">Agama</label>
                <select class="form-select" name="agama" aria-label="Agama">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konguchu">Konguchu</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Jabatan</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="manajer" type="radio" name="jabatan"
                        data-sb-validations="required" value="Manajer" />
                    <label class="form-check-label" for="manajer">Manajer</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="asisten" type="radio" name="jabatan"
                        data-sb-validations="required" value="Asisten" />
                    <label class="form-check-label" for="asisten">Asisten</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="kabag" type="radio" name="jabatan"
                        data-sb-validations="required" value="Kabag" />
                    <label class="form-check-label" for="kabag">Kabag</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="staff" type="radio" name="jabatan"
                        data-sb-validations="required" value="Staff" />
                    <label class="form-check-label" for="staff">Staff</label>
                </div>
                <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label d-block">Status</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="menikah" type="radio" name="status"
                        data-sb-validations="required" value="Menikah" />
                    <label class="form-check-label" for="menikah">Menikah</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" id="belumMenikah" type="radio" name="status"
                        data-sb-validations="required" value="belumMenikah" />
                    <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                </div>
                <div class="invalid-feedback" data-sb-feedback="status:required">One option is required.</div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlahAnak">Jumlah anak</label>
                <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah anak"
                    data-sb-validations="required" />
                <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah anak is required.</div>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a
                        href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" id="submitButton" type="submit" name="sambit">Submit</button>
            </div>
        </form>
        <?php 
        
            // Variable
            $nama = $_POST['nama'];
            $agama = $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $jumlahAnak = $_POST['jumlahAnak'];
            $submit = $_POST['sambit'];
            $gajiPokok = null;
            // Menentukan gaji
            switch($jabatan) {
                case "Manajer" : $gajiPokok = 20000000; break;
                case "Asisten" : $gajiPokok = 15000000; break;
                case "Kabag" : $gajiPokok = 10000000; break;
                case "Staff" : $gajiPokok = 4000000; break;
            }
          
            if($status == "Menikah" && $jumlahAnak <= 2) {
               $tunjanganKeluarga = $gajiPokok * 0.05; 
            } else if($status == "Menikah" && $jumlahAnak <= 5) {
                $tunjanganKeluarga = $gajiPokok * 0.10;
            } else if($status == "Menikah" && $jumlahAnak > 5) {
                $tunjanganKeluarga = $gajiPokok * 0.15;
            } else {
                return "Belum mendapatkan tunjangan keluarga";
            }

            $tunjanganJabatan = $gajiPokok * 0.2;
            $gajiKotor = $gajiPokok + $tunjanganJabatan + $tunjanganKeluarga;
            $zakat = ($agama == "Islam" && $gajiKotor >= 6000000) ? $gajiKotor * 0.025 : 0;
            $homepay = $gajiKotor - $zakat;

            if(isset($submit)) {
        ?>
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">Nama</th>
                    <th scope="col">Agama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Gaji Pokok</th>
                    <th scope="col">Tunjangan Jabatan</th>
                    <th scope="col">Tunjangan Keluarga</th>
                    <th scope="col">Gaji Kotor</th>
                    <th scope="col">Zakat</th>
                    <th scope="col">Take Home Pay</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $nama ?></td>
                    <td><?= $agama ?></td>
                    <td><?= $jabatan ?></td>
                    <td><?= $status ?></td>
                    <td><?= number_format($gajiPokok,0,',','.'); ?></td>
                    <td><?= number_format($tunjanganJabatan,0,',','.'); ?></td>
                    <td><?= number_format($tunjanganKeluarga,0,',','.'); ?></td>
                    <td><?= number_format($gajiKotor,0,',','.'); ?></td>
                    <td><?= number_format($zakat,0,',','.'); ?></td>
                    <td><?= number_format($homepay,0,',','.'); ?></td>
                </tr>
                <?php } ?>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>