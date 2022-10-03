<?php 
require_once 'Bentuk2D.php';

class Persegi extends Bentuk2D{
    public $panjang;
    public $lebar;

    public function __construct($panjang,$lebar) 
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function namaBidang() {
        echo "Persegi";
    }
    public function luasBidang() {
        $luas = $this->panjang * $this->lebar;
        return $luas;
    }

    public function  kelilingBidang() {
        $keliling = 2 * ($this->panjang + $this->lebar);
        return $keliling;
    }

    public function keterangan() {
        echo ' Panjang => '.$this->panjang."<br/> Lebar=> ".$this->lebar;
    }

    public function mencetak() {
        echo $this->namaBidang();
        echo 'Luas :'.$this->luasBidang();
        echo 'Keliling :'.$this->kelilingBidang().'<br/><br/>';
    }
}
?>