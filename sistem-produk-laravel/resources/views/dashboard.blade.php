<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="flex flex-col rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
                <h3 class="text-sm font-medium text-neutral-500">Total Produk</h3>
                <p class="text-2xl font-bold">{{ $totalProduk }}</p>
            </div>
            <div class="flex flex-col rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
                <h3 class="text-sm font-medium text-neutral-500">Produk Tersedia</h3>
                <p class="text-2xl font-bold">{{ $produkTersedia }}</p>
            </div>
            <div class="flex flex-col rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
                <h3 class="text-sm font-medium text-neutral-500">Stok Terbanyak</h3>
                @if($stokTerbanyak)
                    <p class="text-lg font-bold">{{ $stokTerbanyak['nama'] }}</p>
                    <p class="text-sm text-neutral-600">Stok: {{ $stokTerbanyak['stok'] }}</p>
                @else
                    <p class="text-sm text-neutral-500">-</p>
                @endif
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
        </div>
    </div>
</x-layouts::app>
