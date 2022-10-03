<?php 
require_once 'Bentuk2D.php';

class Lingkaran extends Bentuk2D{
    public $jariJari;

    public function __construct($jariJari) 
    {
        $this->jariJari = $jariJari;
    }

    public function namaBidang() {
        echo "Lingkaran";
    }
    public function luasBidang() {
        $luas = 3.14 * $this->jariJari * $this->jariJari;
        return $luas;
    }

    public function  kelilingBidang() {
        $keliling = 2 * 3.14 * $this->jariJari;
        return $keliling;
    }

    public function keterangan() {
        echo ' Jari-jari=> '.$this->jariJari;
    }

    public function mencetak() {
        echo $this->namaBidang();

        echo 'Luas :'.$this->luasBidang();
        echo 'Keliling :'.$this->kelilingBidang().'<br/><br/>';
    }
}
?>