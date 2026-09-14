<?php

class buku
{
    private string $kode;
    private string $judul;
    private string $penulis;
    private int $tahunTerbit;
    private bool $sedangDipinjam = false;

    public function __construct(
        string $kode,
        string $judul,
        string $penulis,
        int $tahunTerbit
    ) {
        $this->kode = $kode;
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahunTerbit = $tahunTerbit;
    }

    public function pinjam(): string
    {
        if ($this->sedangDipinjam === true) {
            return "Buku '{$this->judul}' sedang dipinjam";
        }

        $this->sedangDipinjam = true;
        return "Buku '{$this->judul}' berhasil dipinjam";
    }

    public function kembalikan(): string
    {
        if ($this->sedangDipinjam === false) {
            return "Buku '{$this->judul}' tidak sedang dipinjam";
        }

        $this->sedangDipinjam = false;
        return "Buku '{$this->judul}' berhasil dikembalikan";
    }

    public function getStatus(): string
    {
        return $this->sedangDipinjam ? "Dipinjam" : "Tersedia";
    }

    public function getData(): array
    {
      $kode = $this->kode;
      $judul = $this->judul;
      $penulis = $this->penulis;
      $tahunTerbit = $this->tahunTerbit;
      $status = $this->getStatus();

      return compact('kode', 'judul', 'penulis', 'tahunTerbit', 'status');
    }
}