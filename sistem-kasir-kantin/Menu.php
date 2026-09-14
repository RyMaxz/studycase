
<?php
class Menu {
    private $kode;
    private $nama;
    private $harga;
    protected $kategori;
    protected $stok;

    public function __construct($kode, $nama, $harga, $kategori, $stok) {
        if ($harga < 0) {
            throw new Exception("Harga tidak boleh negatif!");
        }
        if ($stok < 0) {
            throw new Exception("Stok tidak boleh negatif!");
        }

        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
        $this->stok = $stok;
    }

    public function tambahStok($jumlah) {
        if ($jumlah < 0) {
            throw new Exception("Jumlah tambah stok tidak boleh negatif!");
        }
        $this->stok += $jumlah;
        return $this->stok;
    }

    public function kurangiStok($jumlah) {
        if ($jumlah < 0) {
            throw new Exception("Jumlah kurangi stok tidak boleh negatif!");
        }
        if ($jumlah > $this->stok) {
            throw new Exception("Stok tidak cukup! Stok tersedia: " . $this->stok);
        }
        $this->stok -= $jumlah;
        return $this->stok;
    }

    public function hitungTotalHarga($jumlah) {
        if ($jumlah < 0) {
            throw new Exception("Jumlah pembelian tidak boleh negatif!");
        }
        if ($jumlah > $this->stok) {
            throw new Exception("Pesanan melebihi jumlah stok!");
        }
        return $this->harga * $jumlah;
    }

    public function getData() {
        $kode = $this->kode;
        $nama = $this->nama;
        $harga = $this->harga;
        $kategori = $this->kategori;
        $stok = $this->stok;
        $status = $this->stok > 0 ? "Tersedia" : "Habis";

        return compact('kode', 'nama', 'harga', 'kategori', 'stok', 'status');
    }
}
?>