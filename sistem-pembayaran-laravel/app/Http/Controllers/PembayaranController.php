<?php

namespace App\Http\Controllers;

use App\Contracts\PembayaranInterface;
use App\Services\Payment\Cash;
use App\Services\Payment\EWallet;
use App\Services\Payment\TransferBank;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $jumlah = 150000;

        // Setiap object berbeda class, tapi punya "kontrak" yang sama
        $metodePembayaran = [
            'Transfer Bank' => new TransferBank(),
            'E-Wallet'      => new EWallet(),
            'Cash'          => new Cash(),
        ];

        $hasil = [];

        foreach ($metodePembayaran as $nama => $metode) {
            $hasil[$nama] = $this->proses($metode, $jumlah);
        }

        return view('pembayaran.index', compact('hasil', 'jumlah'));
    }

    // Bergantung pada interface, bukan class konkret (Dependency Inversion)
    private function proses(PembayaranInterface $pembayaran, float $jumlah): string
    {
        return $pembayaran->bayar($jumlah);
    }
}