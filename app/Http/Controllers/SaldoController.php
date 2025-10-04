<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $saldo = Saldo::latest()->first();
        return view('saldo.index', compact('saldo'));
    }

    public function create()
    {
        return view('saldo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1',
        ]);

        Saldo::create([
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('saldo.index')->with('success', 'Saldo berhasil ditambahkan!');
    }
}
