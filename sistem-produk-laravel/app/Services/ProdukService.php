<?php

namespace App\Services;

class ProdukService
{
    public function getAllProduk(): array
    {
        return [
            ['id' => 1, 'nama' => 'Laptop ASUS ROG', 'kategori' => 'Elektronik', 'harga' => 15000000, 'stok' => 5],
            ['id' => 2, 'nama' => 'Mouse Logitech MX', 'kategori' => 'Elektronik', 'harga' => 250000, 'stok' => 0],
            ['id' => 3, 'nama' => 'Kaos Polos Cotton', 'kategori' => 'Pakaian', 'harga' => 75000, 'stok' => 20],
            ['id' => 4, 'nama' => 'Sepatu Nike Air', 'kategori' => 'Pakaian', 'harga' => 1200000, 'stok' => 3],
            ['id' => 5, 'nama' => 'Buku Laravel Pemula', 'kategori' => 'Buku', 'harga' => 120000, 'stok' => 10],
            ['id' => 6, 'nama' => 'Keyboard Mechanical', 'kategori' => 'Elektronik', 'harga' => 850000, 'stok' => 0],
            ['id' => 7, 'nama' => 'Jaket Hoodie', 'kategori' => 'Pakaian', 'harga' => 300000, 'stok' => 15],
        ];
    }

    public function getByKategori(string $kategori): array
    {
        return array_values(array_filter($this->getAllProduk(), fn ($p) => strtolower($p['kategori']) === strtolower($kategori)));
    }

    public function getTersedia(): array
    {
        return array_values(array_filter($this->getAllProduk(), fn ($p) => $p['stok'] > 0));
    }

    public function getHargaDiAtas(int $harga): array
    {
        return array_values(array_filter($this->getAllProduk(), fn ($p) => $p['harga'] >= $harga));
    }

    public function getCategories(): array
    {
        return array_unique(array_column($this->getAllProduk(), 'kategori'));
    }

    public function filter(array $filters): array
    {
        $produk = $this->getAllProduk();

        if (!empty($filters['kategori'])) {
            $produk = array_filter($produk, fn ($p) => strtolower($p['kategori']) === strtolower($filters['kategori']));
        }

        if (isset($filters['tersedia']) && $filters['tersedia'] === 'true') {
            $produk = array_filter($produk, fn ($p) => $p['stok'] > 0);
        }

        if (isset($filters['harga_min']) && is_numeric($filters['harga_min'])) {
            $produk = array_filter($produk, fn ($p) => $p['harga'] >= $filters['harga_min']);
        }

        return array_values($produk);
    }

    public function getJumlahProduk(): int
    {
        return count($this->getAllProduk());
    }

    public function getStokTerbanyak(): ?array
    {
        $produk = $this->getAllProduk();
        if (empty($produk)) return null;
        usort($produk, fn ($a, $b) => $b['stok'] <=> $a['stok']);
        return $produk[0];
    }
}
