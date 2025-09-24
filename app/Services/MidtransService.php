<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        // Load config dari .env
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false; // true kalau Production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    /**
     * Buat transaksi Snap Token
     */
    public function createTransaction($orderId, $amount, $customer)
    {
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $customer['first_name'] ?? 'Customer',
                'email' => $customer['email'] ?? 'test@example.com',
                'phone' => $customer['phone'] ?? '08123456789',
            ],
        ];

        return Snap::getSnapToken($params);
    }
}
