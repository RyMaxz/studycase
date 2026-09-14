<?php

require_once 'function.php';

$buku1 = new buku("B001", "Phaedo", "Plato", 2005);
$buku2 = new buku("B002", "Cosmos", "Carl Sagan", 1980);
$buku3 = new buku("B003", "Filosofi Teras", "Henry Manampiring", 2018);

$daftarBuku = [$buku1, $buku2, $buku3];

echo "=== DAFTAR BUKU AWAL ===\n";
foreach ($daftarBuku as $buku) {
    $data = $buku->getData();
    echo "Kode           : " . $data['kode'] . "\n";
    echo "Judul          : " . $data['judul'] . "\n";
    echo "Penulis        : " . $data['penulis'] . "\n";
    echo "Tahun Terbit   : " . $data['tahunTerbit'] . "\n";
    echo "Status         : " . $data['status'] . "\n";
    echo "-----------------------------\n";
}

echo "\n=== PINJAM ===\n";

echo "1. Pinjam buku yang tersedia:\n";
echo "  " . $buku1->pinjam() . "\n";
echo "2. Pinjam buku yang sama lagi:\n";
echo "  " . $buku1->pinjam() . "\n";
echo "3. Kembalikan buku:\n";
echo "  " . $buku1->kembalikan() . "\n";
echo "4. Pinjam buku 2:\n";
echo "  " . $buku2->pinjam() . "\n";

echo "\n=== STATUS AKHIR DARI BUKU ===\n";
foreach ($daftarBuku as $buku) {
    $data = $buku->getData();
    echo "Kode           : " . $data['kode'] . "\n";
    echo "Judul          : " . $data['judul'] . "\n";
    echo "Penulis        : " . $data['penulis'] . "\n";
    echo "Tahun Terbit   : " . $data['tahunTerbit'] . "\n";
    echo "Status         : " . $data['status'] . "\n";
    echo "-----------------------------\n";
}