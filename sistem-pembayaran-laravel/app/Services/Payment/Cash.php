<?php

namespace App\Services\Payment;

use App\Contracts\PembayaranInterface;

class Cash implements PembayaranInterface
{
    public function bayar(float $jumlah): string
    {
        return 'Pembayaran sebesar Rp' . number_format($jumlah, 0, ',', '.')
             . ' dibayar tunai (Cash) di kasir.';
    }
}