<?php

namespace App\Contracts;

interface PembayaranInterface
{
    public function bayar(float $jumlah): string;
}