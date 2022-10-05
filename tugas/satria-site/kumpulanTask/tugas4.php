<?php 
class Pegawai{
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;

    public function __construct($nip,$nama,$jabatan,$agama,$status)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }

    public function setGajiPokok() {
      switch($this->jabatan) {
        case "Manager": $gajiPokok = 15000000;break;
        case "Asmen": $gajiPokok = 10000000;break;
        case "Kabag": $gajiPokok = 7000000;break;
        case "Staff": $gajiPokok = 4000000;break;
      }
      return $gajiPokok;
    }

    public function setTunjab() {
        $tunjanganJabatan = $this->setGajiPokok() * 0.2;
        return $tunjanganJabatan;
    }

    public function setTunkel() {
        $tunjanganKeluarga = ($this->status == "Menikah") ? $this->setGajiPokok() * 0.1 : 0;
        return $tunjanganKeluarga;
    }

    public function gajiKotor() {
        $gator = $this->setGajiPokok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }

    public function setZakatProfesi() {
        $zakatProfesi = ($this->agama == "Islam" && $this->gajiKotor() >= 6000000) ? $this->setGajiPokok() * 0.025 : 0 ;
        return $zakatProfesi;
    }

    public function takeHomePay() {
        $takeHomePay = $this->gajiKotor() - $this->setZakatProfesi();
        return $takeHomePay;
    }

    public function mencetak() {
        echo 'Data Gaji Pegawai';
        echo '<br />NIP :'.$this->nip;
        echo '<br />Nama :'.$this->nama;
        echo '<br />Jabatan :'.$this->jabatan;
        echo '<br />Agama :'.$this->agama;
        echo '<br />Status :'.$this->status;
        echo '<br />Gaji Pokok : Rp.'.number_format($this->setGajiPokok(), 0, ',', '.');
        echo '<br />Tunjangan Jabatan : Rp.'.number_format($this->setTunjab(), 0, ',', '.');
        echo '<br />Tunjangan Keluarga : Rp.'.number_format($this->setTunkel(), 0, ',', '.');
        echo '<br />Zakat : Rp.'.number_format($this->setZakatProfesi(), 0, ',', '.');
        echo '<br />Gaji Bersih : Rp.'.number_format($this->takeHomePay(), 0, ',', '.');
        echo '<hr />';
    }

}
?>