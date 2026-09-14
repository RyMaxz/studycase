<x-layouts::app :title="__('Daftar Produk')">
    <div class="flex flex-col gap-6">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-zinc-900 dark:text-zinc-100">Daftar Produk</h1>
            <p class="text-sm text-zinc-500 dark:text-zinc-400">Kelola dan filter katalog produk di sistem.</p>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('produk.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4 bg-zinc-50 dark:bg-zinc-900/50 p-4 rounded-xl border border-zinc-200 dark:border-zinc-800">
            <div>
                <label class="block text-xs font-semibold text-zinc-600 dark:text-zinc-400 mb-1.5 uppercase tracking-wider">Kategori</label>
                <select name="kategori" class="w-full rounded-lg border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('kategori') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-zinc-600 dark:text-zinc-400 mb-1.5 uppercase tracking-wider">Minimum Harga (Rp)</label>
                <input type="number" name="harga_min" value="{{ request('harga_min') }}" placeholder="Contoh: 100000" class="w-full rounded-lg border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100 text-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center pt-5">
                <label class="flex items-center cursor-pointer select-none">
                    <input type="checkbox" name="tersedia" value="true" {{ request('tersedia') === 'true' ? 'checked' : '' }} class="rounded border-zinc-300 dark:border-zinc-700 text-indigo-600 focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-zinc-700 dark:text-zinc-300 font-medium">Tersedia Saja</span>
                </label>
            </div>

            <div class="flex items-center gap-2 pt-5">
                <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition">Filter</button>
                <a href="{{ route('produk.index') }}" class="px-4 py-2 bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200 rounded-lg text-sm font-medium hover:bg-zinc-300 dark:hover:bg-zinc-600 transition">Reset</a>
            </div>
        </form>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Total Produk</span>
                    <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100 mt-1">{{ $jumlahProduk }}</p>
                </div>
                <div class="p-3 bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 rounded-lg">
                    <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                </div>
            </div>

            <div class="bg-zinc-50 dark:bg-zinc-900/50 border border-zinc-200 dark:border-zinc-800 p-4 rounded-xl flex items-center justify-between">
                <div>
                    <span class="text-xs font-semibold text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Stok Terbanyak</span>
                    @if($stokTerbanyak)
                        <p class="text-lg font-bold text-zinc-900 dark:text-zinc-100 mt-1">{{ $stokTerbanyak['nama'] }} <span class="text-sm font-normal text-zinc-500">({{ $stokTerbanyak['stok'] }} unit)</span></p>
                    @else
                        <p class="text-sm text-zinc-500 mt-1">-</p>
                    @endif
                </div>
                <div class="p-3 bg-emerald-50 dark:bg-emerald-950/50 text-emerald-600 dark:text-emerald-400 rounded-lg">
                    <svg class="size-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                </div>
            </div>
        </div>
        
        <!-- Data Table -->
        <div class="border border-zinc-200 dark:border-zinc-800 rounded-xl overflow-hidden shadow-xs">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-zinc-600 dark:text-zinc-300">
                    <thead class="bg-zinc-100 dark:bg-zinc-800/80 text-xs text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">
                        <tr>
                            <th scope="col" class="px-6 py-3.5 font-semibold">ID</th>
                            <th scope="col" class="px-6 py-3.5 font-semibold">Nama Produk</th>
                            <th scope="col" class="px-6 py-3.5 font-semibold">Kategori</th>
                            <th scope="col" class="px-6 py-3.5 font-semibold">Harga</th>
                            <th scope="col" class="px-6 py-3.5 font-semibold">Stok</th>
                            <th scope="col" class="px-6 py-3.5 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-800 bg-white dark:bg-zinc-900">
                        @forelse($produk as $p)
                            <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/50 transition">
                                <td class="px-6 py-4 font-mono text-xs font-medium text-zinc-500">{{ $p['id'] }}</td>
                                <td class="px-6 py-4 font-medium text-zinc-900 dark:text-zinc-100">{{ $p['nama'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-200">
                                        {{ $p['kategori'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-medium text-zinc-900 dark:text-zinc-100">Rp {{ number_format($p['harga'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-medium">{{ $p['stok'] }}</td>
                                <td class="px-6 py-4">
                                    @if($p['stok'] > 0)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-50 text-rose-700 dark:bg-rose-950/60 dark:text-rose-400 border border-rose-200 dark:border-rose-800/50">
                                            <span class="size-1.5 rounded-full bg-rose-500"></span>
                                            Habis
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-zinc-500 dark:text-zinc-400">
                                    Tidak ada produk yang ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts::app>