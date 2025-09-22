@extends('layouts.dashboard')

@section('content')
<h2 class="text-3xl font-bold mb-8">Dashboard</h2>

<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl shadow-xl p-6 text-white transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h3 class="text-sm opacity-80">Total Menu</h3>
        <p class="text-4xl font-bold">{{ $totalMenu }}</p>
    </div>

    <div class="bg-gradient-to-r from-pink-500 to-red-500 rounded-2xl shadow-xl p-6 text-white transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h3 class="text-sm opacity-80">Pesanan Hari Ini</h3>
        <p class="text-4xl font-bold">{{ $totalOrderToday }}</p>
    </div>

    <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl shadow-xl p-6 text-white transform transition duration-300 hover:scale-105 hover:shadow-2xl">
        <h3 class="text-sm opacity-80">Pendapatan</h3>
        <p class="text-4xl font-bold">Rp {{ number_format($totalRevenue) }}</p>
    </div>
</div>

<!-- Chart -->
<div class="mt-10 bg-white rounded-2xl shadow-lg p-6">
    <h3 class="text-xl font-semibold mb-4">Grafik Penjualan</h3>
    <canvas id="salesChart" class="w-full h-64"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = {!! isset($sales) ? json_encode($sales->keys()->toArray()) : '[]' !!};
const data = {!! isset($sales) ? json_encode($sales->values()->toArray()) : '[]' !!};

new Chart(document.getElementById('salesChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Penjualan Harian',
            data: data,
            backgroundColor: [
                'rgba(79, 70, 229, 0.8)',
                'rgba(236, 72, 153, 0.8)',
                'rgba(16, 185, 129, 0.8)',
                'rgba(245, 158, 11, 0.8)',
            ],
            borderRadius: 12,
            barThickness: 40
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: 'top' }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>
@endsection
