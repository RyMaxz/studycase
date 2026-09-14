<?php

require_once 'models/Siswa.php';

class SiswaController
{
    private $daftarSiswa = [];

    public function __construct()
    {
        $this->inisialisasiData();
    }

    private function inisialisasiData()
    {
        $siswa1 = new Siswa('Ahmad Rizki', '2024001', 'XII IPA 1', 85);
        $siswa2 = new Siswa('Siti Nurhaliza', '2024002', 'XII IPA 2', 72);
        $siswa3 = new Siswa('Budi Santoso', '2024003', 'XII IPS 1', 78);

        $this->daftarSiswa = [$siswa1, $siswa2, $siswa3];
    }

    public function index()
    {
        $data = [];
        foreach ($this->daftarSiswa as $siswa) {
            $data[] = $siswa->tampilkanData();
        }
        return $data;
    }

    public function getDaftarSiswa()
    {
        return $this->daftarSiswa;
    }
}
