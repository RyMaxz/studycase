<?php

require_once 'kendaraan.php';

class motor extends kendaraan {

    public function getInfo() {
        $info = parent::getInfo();
        $info['jenis'] = 'motor';
        return $info;
    }
}