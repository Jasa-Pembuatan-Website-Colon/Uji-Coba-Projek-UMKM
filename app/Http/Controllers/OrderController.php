<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
     public function store(Request $request)
    {
        $request->validate([
            'harga' => 'required|numeric',
        ]);

        Menu::create($request->all());
        return redirect()->route('menu.index');
    }
}
