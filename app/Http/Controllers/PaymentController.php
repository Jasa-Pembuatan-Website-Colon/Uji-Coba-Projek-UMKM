<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MidtransService;

class PaymentController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    // Halaman checkout
    public function checkout(Request $request)
    {
        $orderId = 'ORDER-' . time();
        $amount = 100000; // contoh 100 ribu

        $customer = [
            'first_name' => 'Budi',
            'email' => 'budi@example.com',
            'phone' => '08123456789',
        ];

        $snapToken = $this->midtrans->createTransaction($orderId, $amount, $customer);

        return view('checkout', compact('snapToken', 'orderId', 'amount'));
    }
}
