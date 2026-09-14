<?php
require_once 'Menu.php';
require_once 'MenuMinuman.php';

$menuList =[
  new Menu("M001", "Nasi Goreng", 15000, "Makanan", 10),
  new Menu("M002", "Mie Ayam", 12000, "Makanan", 8),
  new Menu("M003", " Ayam Geprek", 18000, "Makanan", 5),
  new MenuMinuman("D001", "Es Teh", 5000, "Minuman", 15, "Sedang"),
  new MenuMinuman("D002", "Es Jeruk", 10000, "Minuman", 12, "Besar"),
  new MenuMinuman("D003", "Kopi", 8000, "Minuman", 0, "Sedang")
];

echo "=== DAFTAR MENU KANTIN ===\n\n";

$kategoris = ["Makanan", "Minuman"];

foreach ($kategoris as $kategori) {
    echo "--- $kategori ---\n";
    foreach ($menuList as $menu) {
        $data = $menu->getData();
        if ($data['kategori'] == $kategori) {
            echo "Kode: {$data['kode']}\n";
            echo "Nama: {$data['nama']}\n";
            echo "Harga: Rp " . number_format($data['harga'], 0, ',', '.') . "\n";
            echo "Stok: {$data['stok']}\n";
            echo "Status: {$data['status']}\n";
            if (isset($data['ukuran'])) {
                echo "Ukuran: {$data['ukuran']}\n";
            }
            echo "\n";
        }
    }
}

echo "=== UJI COBA PEMBELIAN ===\n\n";

echo "Test 1: Beli 2 Nasi Goreng\n";
try {
    $menu = $menuList[0];
    $jumlah = 2;
    $total = $menu->hitungTotalHarga($jumlah);
    echo "Total harga: Rp " . number_format($total, 0, ',', '.') . "\n";
    $menu->kurangiStok($jumlah);
    $data = $menu->getData();
    echo "Stok tersisa: {$data['stok']}\n";
    echo "Status: BERHASIL\n\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n\n";
}

echo "Test 2: Beli 1 Kopi (stok habis)\n";
try {
    $menu = $menuList[5];
    $jumlah = 1;
    $total = $menu->hitungTotalHarga($jumlah);
    echo "Total harga: Rp " . number_format($total, 0, ',', '.') . "\n";
    $menu->kurangiStok($jumlah);
    echo "Status: BERHASIL\n\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Status: GAGAL\n\n";
}

echo "Test 3: Beli 10 Ayam Geprek (stok hanya 5)\n";
try {
    $menu = $menuList[2];
    $jumlah = 10;
    $total = $menu->hitungTotalHarga($jumlah);
    echo "Total harga: Rp " . number_format($total, 0, ',', '.') . "\n";
    $menu->kurangiStok($jumlah);
    echo "Status: BERHASIL\n\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Status: GAGAL\n\n";
}
?>