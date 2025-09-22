<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // statistik singkat
        $totalMenu = Menu::count();
        $totalOrderToday = Order::whereDate('created_at', today())->count();
        $totalRevenue = Order::whereDate('created_at', today())->sum('total');

        // ambil penjualan per hari (7 hari terakhir) — hasilnya collection dengan key = date, value = total
        $sales = Order::selectRaw('DATE(created_at) as date, COALESCE(SUM(total), 0) as total')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('total', 'date');

        // pastikan selalu ada collection, supaya view tidak error
        if (! $sales) {
            $sales = collect();
        }

        return view('dashboard', compact(
            'totalMenu',
            'totalOrderToday',
            'totalRevenue',
            'sales'
        ));
    }
}
