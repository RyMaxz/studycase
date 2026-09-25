<?php

namespace App\DTO;

// ============================================================
// MATERI 9 & 12: INHERITANCE + PENGGUNAAN DI LARAVEL
// ============================================================

// CLASS INDUK — Base DTO untuk data Karyawan
abstract class KaryawanDTO {
    // Properti protected: bisa diwarisi oleh child class
    public function __construct(
        protected readonly string $nama,
        protected readonly string $nip,
        protected readonly string $departemen,
        protected readonly string $email
    ) {}

    // Getter methods
    public function getNama(): string       { return $this->nama; }
    public function getNip(): string        { return $this->nip; }
    public function getDepartemen(): string { return $this->departemen; }
    public function getEmail(): string      { return $this->email; }

    // Abstract method — WAJIB diimplementasikan child class
    abstract public function getStatus(): string;
    abstract public function hitungGaji(): float;

    // Helper method untuk format rupiah
    public function getGajiFormatted(): string {
        return 'Rp ' . number_format($this->hitungGaji(), 0, ',', '.');
    }
}

// ============================================================
// CLASS ANAK 1: KaryawanTetapDTO
// ============================================================
class KaryawanTetapDTO extends KaryawanDTO {
    public function __construct(
        string         $nama,
        string         $nip,
        string         $departemen,
        string         $email,
        private float  $gajiPokok,
        private float  $tunjangan,
        private string $golongan
    ) {
        // Wajib memanggil parent constructor
        parent::__construct($nama, $nip, $departemen, $email);
    }

    public function getStatus(): string   { return 'Tetap'; }
    public function getGolongan(): string { return $this->golongan; }

    public function hitungGaji(): float {
        return $this->gajiPokok + $this->tunjangan;
    }
}

// ============================================================
// CLASS ANAK 2: KaryawanKontrakDTO
// ============================================================
class KaryawanKontrakDTO extends KaryawanDTO {
    public function __construct(
        string         $nama,
        string         $nip,
        string         $departemen,
        string         $email,
        private float  $gajiPerBulan,
        private string $masaKontrak
    ) {
        parent::__construct($nama, $nip, $departemen, $email);
    }

    public function getStatus(): string      { return 'Kontrak'; }
    public function getMasaKontrak(): string { return $this->masaKontrak; }

    public function hitungGaji(): float {
        return $this->gajiPerBulan; // Gaji tetap tanpa tunjangan
    }
}

// ============================================================
// CLASS ANAK 3: KaryawanMagangDTO
// ============================================================
class KaryawanMagangDTO extends KaryawanDTO {
    public function __construct(
        string        $nama,
        string        $nip,
        string        $departemen,
        string        $email,
        private float $uangSaku,
        private int   $durasiMinggu
    ) {
        parent::__construct($nama, $nip, $departemen, $email);
    }

    public function getStatus(): string { return 'Magang'; }

    public function hitungGaji(): float {
        return $this->uangSaku; // Hanya uang saku
    }
}