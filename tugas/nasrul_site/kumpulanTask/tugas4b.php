<?php 
    require 'tugas4.php';

    $p1 = new Pegawai('001','Asep','Manager','Islam','Menikah');
    $p2 = new Pegawai('002','Riski','Asmen','Kriten','Belum Menikah');
    $p3 = new Pegawai('003','Rama','Staff','Hindu','Menikah');
    $p4 = new Pegawai('004','Riska','Kabag','Budha','Belum Menikah');
    $p5 = new Pegawai('005','Lala','Asmen','Protestan','Menikah');
    
    $p1->mencetak();
    $p2->mencetak();
    $p3->mencetak();
    $p4->mencetak();
    $p5->mencetak();

?>