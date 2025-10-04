<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee House - Payment Gateway</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
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
            font-size: 0.9rem;
            color: #7f5645;
            margin-bottom: 1.5rem;
        }

        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .payment-method {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid #cdb0a2;
            border-radius: 0.9rem;
            padding: 0.8rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-method img {
            max-width: 60px;
            height: auto;
            margin-bottom: 0.5rem;
        }

        .payment-method:hover {
            border-color: #9e7260;
            box-shadow: 0 4px 12px rgba(97, 64, 50, 0.25);
            transform: translateY(-2px);
        }

        .payment-method.active {
            border: 2px solid #7f5645;
            background: #f3ebe7;
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

        @media (max-width: 480px) {
            .payment-methods {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

    @include('components.headerKedua')

    <div class="payment-card">
        <h1>Payment Gateway</h1>
        <p>Pilih metode pembayaran favoritmu ☕️</p>

        <!-- Laravel form -->
        <form method="get" action="/checkout">
            @csrf

            <!-- Pilihan metode -->
            <div class="payment-methods">
                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="img/quick-response-code-indonesia-standard-qris-logo-png_seeklogo-391791-removebg-preview.png"
                        alt="QRIS">
                    <span>QRIS</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="img/bank-bri-logo-png_seeklogo-355613-removebg-preview.png" alt="BRI">
                    <span>BRI</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="img/gopay-logo-png_seeklogo-369813-removebg-preview.png" alt="Gopay">
                    <span>GoPay</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="img/dana-logo-png_seeklogo-38400-removebg-preview.png" alt="Dana">
                    <span>Dana</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="img/text-business-cdr-bank-blue-removebg-preview.png" alt="BCA">
                    <span>BCA</span>
                </div>
            </div>

            <!-- Summary -->
            <div class="payment-summary">
                <p><span>Total Belanja</span> <strong>Rp 120.000</strong></p>
                <p><span>Metode</span> <strong id="payment-selected">-</strong></p>
            </div>

            <!-- Submit -->
            <div class="div-btn">
                <a href="/checkout" type="submit" class="payment-btn">
                    <i class="fas fa-credit-card"></i> Bayar Sekarang
                </a>
            </div>
        </form>
    </div>

    <script>
        function selectPayment(element) {
            // hapus active dari semua
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('active');
            });

            // aktifkan yang dipilih
            element.classList.add('active');
            document.getElementById('payment-selected').textContent =
                element.querySelector('span').textContent;
        }
    </script>
</body>

</html>
