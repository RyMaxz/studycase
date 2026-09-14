<?php

namespace App\Http\Controllers;

use App\Services\ProdukService;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected ProdukService $service;

    public function __construct(ProdukService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $produk = $this->service->filter($request->only(['kategori', 'tersedia', 'harga_min']));

        // Statistics
        $jumlahProduk = $this->service->getJumlahProduk();
        $stokTerbanyak = $this->service->getStokTerbanyak();
        $categories = $this->service->getCategories();

        return view('produk.index', compact(
            'produk',
            'jumlahProduk',
            'stokTerbanyak',
            'categories'
        ));
    }
}