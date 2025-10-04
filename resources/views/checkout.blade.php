<!DOCTYPE html>
<html>
<head>
    <title>Checkout Midtrans</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
            data-client-key="{{ config('midtrans.client_key') }}"></script>
            <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>
    <h2>Checkout Order: {{ $orderId }}</h2>
    <p>Total Bayar: Rp {{ number_format($amount, 0, ',', '.') }}</p>

    <button id="pay-button">Bayar Sekarang</button>
    <a href="/">cancel orders</a>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay("{{ $snapToken }}", {
                onSuccess: function(result){
                    console.log('Success:', result);
                    alert("Pembayaran berhasil!");
                },
                onPending: function(result){
                    console.log('Pending:', result);
                    alert("Pembayaran pending!");
                },
                onError: function(result){
                    console.log('Error:', result);
                    alert("Pembayaran gagal!");
                },
                onClose: function(){

<head>
    <title>Checkout Midtrans</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(to bottom right, #f3ebe7, #e4d1c6, #fdfcfb);
            color: #422b21;
            padding: 1rem;
        }

        .payment-card {
            width: 100%;
            max-width: 480px;
            padding: 2rem;
            border-radius: 1.2rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 24px rgba(34, 17, 8, 0.2);
        }

        .payment-card h1 {
            text-align: center;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: #5a3b2c;
        }

        .payment-card p {
            text-align: center;
            font-size: 0.95rem;
            color: #7f5645;
            margin-bottom: 1.5rem;
        }

        .payment-summary {
            margin-top: 1rem;
            font-size: 0.95rem;
            color: #5a3b2c;
        }

        .payment-summary p {
            display: flex;
            justify-content: space-between;
            margin: 0.4rem 0;
        }

        .div-btn {
            margin-top: 2rem;
            width: 100%;
        }

        .payment-btn {
            display: block;
            text-align: center;
            width: 100%;
            padding: 0.9rem;
            border: none;
            border-radius: 0.9rem;
            background: #7f5645;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-btn:hover {
            background: #9e7260;
            box-shadow: 0 6px 18px rgba(97, 64, 50, 0.3);
        }
    </style>
</head>

<body>
    @include('components.header')

    <div class="payment-card">
        <h1>Checkout Order</h1>
        <p>ID Pesanan: <strong>{{ $orderId }}</strong></p>

        <div class="payment-summary">
            <p><span>Total Bayar</span> <strong>Rp {{ number_format($amount, 0, ',', '.') }}</strong></p>
        </div>

        <div class="div-btn">
            <button id="pay-button" class="payment-btn">
                <i class="fas fa-credit-card"></i> Bayar Sekarang
            </button>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay("{{ $snapToken }}", {
                onSuccess: function(result) {
                    console.log('Success:', result);
                    alert("Pembayaran berhasil!");
                },
                onPending: function(result) {
                    console.log('Pending:', result);
                    alert("Pembayaran pending!");
                },
                onError: function(result) {
                    console.log('Error:', result);
                    alert("Pembayaran gagal!");
                },
                onClose: function() {
                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
</body>

</html>
