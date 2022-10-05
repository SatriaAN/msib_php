<?php 
$m1 = ['nim'=>'01102201','nama'=>'Samsudin','nilai'=>90];
$m2 = ['nim'=>'01102202','nama'=>'Budi','nilai'=>59];
$m3 = ['nim'=>'01102203','nama'=>'Rapli','nilai'=>99];
$m4 = ['nim'=>'01102204','nama'=>'Riski','nilai'=>76];
$m5 = ['nim'=>'01102205','nama'=>'Ali','nilai'=>54];
$m6 = ['nim'=>'01102206','nama'=>'Ridwan','nilai'=>65];
$m7 = ['nim'=>'01102207','nama'=>'Malik','nilai'=>77];
$m8 = ['nim'=>'01102208','nama'=>'Kaka','nilai'=>74];
$m9 = ['nim'=>'01102209','nama'=>'Rika','nilai'=>80];
$m10 = ['nim'=>'011022010','nama'=>'Ikay','nilai'=>40];

$arrMahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];
$arrJudul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];


        
      

$jumlahMahasiswa = count($arrMahasiswa);
$nilaiMahasiswa = array_column($arrMahasiswa,'nilai');
$totalNilai = array_sum($nilaiMahasiswa);
$nilaiTertinggi = max($nilaiMahasiswa);
$nilaiTerendah = min($nilaiMahasiswa);
$nilaiRataRata = $totalNilai / $jumlahMahasiswa;

$keterangan = [
    'Jumlah Mahasiswa' => $jumlahMahasiswa,
    'Nilai Tertinggi' => $nilaiTertinggi,
    'Nilai Terendah' => $nilaiTertinggi,
    'Rata-Rata Nilai' => $nilaiRataRata
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <title>Tugas 3 PHP</title>
</head>

<body>
    <div class="container">
        <h1 align="center">Daftar Nilai Mahasiswa</h1>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <?php                 
                    foreach($arrJudul as $judul) { ?>
                    <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 0;
                    foreach($arrMahasiswa as $mahasiswa) { 
                    $ket = ($mahasiswa['nilai'] >= 60) ? 'Lulus' : 'Tidak Lulus';

                    if($mahasiswa['nilai'] >= 80 && $mahasiswa['nilai'] <= 100) {
                        $grade = 'A';
                    } else if ($mahasiswa['nilai'] >= 70 && $mahasiswa['nilai'] < 80) {
                        $grade = 'B';
                    } else if ($mahasiswa['nilai'] >= 60 && $mahasiswa['nilai'] < 70){
                        $grade = 'C';
                    } else if ($mahasiswa['nilai'] >= 50 && $mahasiswa['nilai'] < 60) {
                        $grade = 'D';
                    } else {
                        $grade = 'E';
                    }
                    
                    switch($grade) {
                        case 'A': $predikat = "Memuaskan"; break;
                        case 'B': $predikat = "Baik"; break;
                        case 'C': $predikat = "Cukup"; break;
                        case 'D': $predikat = "Kurang"; break;
                        case 'E': $predikat =  "Buruk"; break;
                    }        
                    ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= $mahasiswa['nim'] ?></td>
                    <td><?= $mahasiswa['nama'] ?></td>
                    <td><?= $mahasiswa['nilai'] ?></td>
                    <td><?= $ket ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <?php
                    foreach($keterangan as $ket => $hasil) {
                ?>
                <tr>
                    <th colspan="6" class="text-center"><?= $ket ?></th>
                    <th><?= $hasil ?></th>
                </tr>
                <?php } ?>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>