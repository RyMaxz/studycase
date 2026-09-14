<?php

require_once 'kendaraan.php';
require_once 'mobil.php';
require_once 'motor.php';

$daftarKendaraan = [
    new mobil('M001', 'Toyota Avanza', 350000),
    new mobil('M002', 'Honda HR-V', 500000),
    new motor('T001', 'Honda Vario', 75000),
    new motor('T002', 'Yamaha NMAX', 100000)
];

echo "==================================================" . PHP_EOL;
echo "          SISTEM PEMINJAMAN KENDARAAN             " . PHP_EOL;
echo "==================================================" . PHP_EOL . PHP_EOL;

echo "--- DAFTAR KENDARAAN ---" . PHP_EOL;
foreach ($daftarKendaraan as $kendaraan) {
    $info = $kendaraan->getInfo();
    $tarifFormat = number_format($info['tarif'], 0, ',', '.');
    echo sprintf(
        "[%-5s] %-5s | %-15s | Rp%-10s/hari | Status: %s" . PHP_EOL,
        $info['jenis'],
        $info['kode'],
        $info['merek'],
        $tarifFormat,
        $info['status']
    );
}

echo PHP_EOL . "--------------------------------------------------" . PHP_EOL;

$daftarKendaraan[0]->sewa();
$biayaMobil = $daftarKendaraan[0]->hitungBiaya(3);
echo "  Biaya: (Tarif Rp350.000 + Asuransi Rp50.000) x 3 hari" . PHP_EOL;
echo "  Total: Rp" . number_format($biayaMobil, 0, ',', '.') . PHP_EOL;

echo PHP_EOL . "--------------------------------------------------" . PHP_EOL;

echo "TEST 2: Sewa Motor Honda Vario (2 hari)" . PHP_EOL;
$daftarKendaraan[2]->sewa();
$biayaMotor = $daftarKendaraan[2]->hitungBiaya(2);
echo "  Biaya: Tarif Rp75.000 x 2 hari (Tanpa Asuransi)" . PHP_EOL;
echo "  Total: Rp" . number_format($biayaMotor, 0, ',', '.') . PHP_EOL;

echo PHP_EOL . "--------------------------------------------------" . PHP_EOL;

echo "TEST 3: Coba sewa ulang Toyota Avanza (kondisi sedang disewa)" . PHP_EOL;
$daftarKendaraan[0]->sewa();

echo PHP_EOL . "--------------------------------------------------" . PHP_EOL;

echo "TEST 4: Kembalikan Toyota Avanza" . PHP_EOL;
$daftarKendaraan[0]->kembalikan();

echo PHP_EOL . "--------------------------------------------------" . PHP_EOL;

echo "TEST 5: Sewa ulang Toyota Avanza setelah dikembalikan" . PHP_EOL;
$daftarKendaraan[0]->sewa();

echo PHP_EOL . "==================================================" . PHP_EOL;

echo "--- STATUS AKHIR SEMUA KENDARAAN ---" . PHP_EOL;
foreach ($daftarKendaraan as $kendaraan) {
    $info = $kendaraan->getInfo();
    echo sprintf(
        "[%-5s] %-5s | %-15s | Status: %s" . PHP_EOL,
        $info['jenis'],
        $info['kode'],
        $info['merek'],
        $info['status']
    );
}
echo "==================================================" . PHP_EOL;