@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-xl p-6">
        <h2 class="text-2xl font-bold mb-5 text-gray-700 flex items-center gap-2">
            💰 Tambah Saldo
        </h2>

      <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-medium">Keterangan</label>
        <input type="text" name="keterangan"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800"
            placeholder="Contoh: Setoran awal">
    </div>

    <div>
        <label class="block font-medium">Nominal</label>
        <input type="number" name="jumlah"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800"
            placeholder="Masukkan nominal">
    </div>

    <button type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        Simpan
    </button>
</form>

    </div>
</div>
@endsection
