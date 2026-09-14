<?php

class kendaraan {
    protected $kode;
    protected $merek;
    protected $tarifPerHari;
    protected $status;

    public function __construct($kode, $merek, $tarifPerHari) {
        $this->kode = $kode;
        $this->merek = $merek;
        $this->tarifPerHari = $tarifPerHari;
        $this->status = 'Tersedia';
    }

    public function sewa() {
        if ($this->status === 'Tersedia') {
            $this->status = 'Disewa';
            echo "  [BERHASIL] Kendaraan {$this->merek} ({$this->kode}) berhasil disewa." . PHP_EOL;
            return true;
        } else {
            echo "  [GAGAL] Maaf, {$this->merek} ({$this->kode}) sedang tidak tersedia." . PHP_EOL;
            return false;
        }
    }

    public function kembalikan() {
        if ($this->status === 'Disewa') {
            $this->status = 'Tersedia';
            echo "  [KEMBALI] Kendaraan {$this->merek} ({$this->kode}) telah dikembalikan." . PHP_EOL;
            return true;
        } else {
            echo "  [INFO] Kendaraan {$this->merek} ({$this->kode}) tidak sedang disewa." . PHP_EOL;
            return false;
        }
    }

    public function hitungBiaya($lamaSewa) {
        return $this->tarifPerHari * $lamaSewa;
    }

    public function getInfo() {
        return [
            'kode' => $this->kode,
            'merek' => $this->merek,
            'tarif' => $this->tarifPerHari,
            'status' => $this->status
        ];
    }

    public function getKode() {
        return $this->kode;
    }
}