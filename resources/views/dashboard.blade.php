<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Kedai Kopi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Statistik -->
            <div class="grid grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-bold">Total Penjualan</h3>
                    <p class="text-2xl"></p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-bold">Jumlah Pesanan</h3>
                    <p class="text-2xl"></p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-lg font-bold">Menu Favorit</h3>
                    <p class="text-2xl">
                        {{ $menuFavorit?->menu->nama ?? '-' }}
                    </p>
                </div>
            </div>

            <!-- Pesanan Terbaru -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-4">Pesanan Terbaru</h3>
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Menu</th>
                            <th class="px-4 py-2">Jumlah</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">{{ $p->menu->nama }}</td>
                            <td class="border px-4 py-2">{{ $p->jumlah }}</td>
                            <td class="border px-4 py-2">
                                <span class="px-2 py-1 rounded {{ $p->status == 'selesai' ? 'bg-green-200' : 'bg-yellow-200' }}">
                                    {{ ucfirst($p->status) }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
