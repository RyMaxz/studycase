<?php

namespace App\Http\Controllers;

use App\Services\ProdukService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected ProdukService $service;

    public function __construct(ProdukService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $totalProduk = $this->service->getJumlahProduk();
        $produkTersedia = count($this->service->getTersedia());
        $stokTerbanyak = $this->service->getStokTerbanyak();

        return view('dashboard', compact('totalProduk', 'produkTersedia', 'stokTerbanyak'));
    }
}
