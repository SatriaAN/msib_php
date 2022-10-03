<?php 
require_once 'Lingkaran.php';
require_once 'Persegi.php';
require_once 'Segitiga.php';

$data1 = new Lingkaran(5);
$data2 = new Persegi(2,5);
$data3 = new Segitiga(2,5,5);
$data4 = new Persegi(10,5);
$data5 = new Lingkaran(10);
$header = ['No','Nama Bidang','Keterangan','Luas Bidang','Keliling Bidang'];

$kumpulanData = [$data1,$data2,$data3,$data4,$data5];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5 PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <?php 
                    foreach($header as $judul){?>
                    <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                foreach($kumpulanData as $data) {?>
                <tr>
                    <td><?= ++$no?></td>
                    <td><?= $data->namaBidang(); ?></td>
                    <td><?= $data->keterangan(); ?></td>
                    <td><?= $data->luasBidang(); ?></td>
                    <td><?= $data->kelilingBidang(); ?></td>
                </tr>
                <?php } ?>
            </tbody>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>