<?php

require_once 'kendaraan.php';

class mobil extends kendaraan {
    private $biayaAsuransi = 50000;

    public function hitungBiaya($lamaSewa) {
        $biayaDasar = parent::hitungBiaya($lamaSewa);
        $biayaAsuransi = $this->biayaAsuransi * $lamaSewa;
        return $biayaDasar + $biayaAsuransi;
    }

    public function getInfo() {
        $info = parent::getInfo();
        $info['jenis'] = 'Mobil';
        $info['asuransi'] = $this->biayaAsuransi;
        return $info;
    }
}