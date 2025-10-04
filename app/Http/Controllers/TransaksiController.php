<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function create()
    {
        return view('transaksi.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'keterangan' => 'required|string',
        'jumlah' => 'required|numeric|min:1',
    ]);

Transaksi::create([
    'user_id' => Auth::id(),   // ini sama persis hasilnya dengan auth()->id()
    'tanggal' => now(),
    'keterangan' => $request->keterangan,
    'jenis' => 'masuk',
    'jumlah' => $request->jumlah,
]);

        return redirect()->route('dashboard')->with('success', 'Saldo berhasil ditambahkan!');
    }
}
