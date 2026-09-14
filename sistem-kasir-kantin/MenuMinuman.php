<?php
require_once 'Menu.php';

class MenuMinuman extends Menu {
    private $ukuran;

    public function __construct($kode, $nama, $harga, $kategori, $stok, $ukuran = "Sedang") {
        parent::__construct($kode, $nama, $harga, $kategori, $stok);
        $this->ukuran = $ukuran;
    }

    public function getData() {
        $data = parent::getData();
        $data['ukuran'] = $this->ukuran;
        return $data;
    }
}
?>