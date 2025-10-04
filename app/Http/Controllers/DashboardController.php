<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
           $userId = Auth::id();

    $saldo = Transaksi::where('user_id', $userId)->where('jenis', 'masuk')->sum('jumlah')
            - Transaksi::where('user_id', $userId)->where('jenis', 'keluar')->sum('jumlah');

    // Total pengeluaran
        $pengeluaran = Transaksi::where('user_id', $userId)->where('jenis', 'keluar')->sum('jumlah');

    // Transaksi terbaru
    $transaksi = DB::table('transaksi')
                ->orderBy('tanggal', 'desc')
                ->limit(10)
                ->get();
    
    return view('dashboard', compact(
            'totalMenu',
            'totalOrderToday',
            'totalRevenue',
            'sales',
            'saldo',
            'pengeluaran',
            'transaksi'
        ));
}

public function reset()
{
    Transaksi::where('user_id', Auth::id())->delete();
    return redirect()->route('dashboard')->with('success', 'Saldo kamu berhasil direset!');
}


}
