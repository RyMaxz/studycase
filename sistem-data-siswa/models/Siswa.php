<?php

class Siswa
{
    private string $nama;
    private string $nis;
    private string $kelas;
    private int $nilai;

    public function __construct(string $nama, string $nis, string $kelas, int $nilai)
    {
        $this->nama = $nama;
        $this->nis = $nis;
        $this->kelas = $kelas;
        $this->nilai = $nilai;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getNis()
    {
        return $this->nis;
    }

    public function getKelas()
    {
        return $this->kelas;
    }

    public function getNilai()
    {
        return $this->nilai;
    }

    public function tampilkanData()
    {
        return [
            'nama' => $this->nama,
            'nis' => $this->nis,
            'kelas' => $this->kelas,
            'nilai' => $this->nilai,
            'status' => $this->cekKelulusan()
        ];
    }

    public function cekKelulusan()
    {
        return $this->nilai >= 75 ? 'Lulus' : 'Tidak Lulus';
    }
}
