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

        .payment-btn {
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
            margin-top: 1.5rem;
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
        <form method="POST" action="{{ route('payment.process') }}">
            @csrf

            <!-- Pilihan metode -->
            <div class="payment-methods">
                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/QRIS_logo.svg/320px-QRIS_logo.svg.png"
                        alt="QRIS">
                    <span>QRIS</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="https://seeklogo.com/images/B/bri-bank-rakyat-indonesia-logo-7A6A910A86-seeklogo.com.png"
                        alt="BRI">
                    <span>BRI</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="https://1000logos.net/wp-content/uploads/2021/05/Gopay-logo.png" alt="Gopay">
                    <span>GoPay</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="https://download.logo.wine/logo/Dana_(software)/Dana_(software)-Logo.wine.png" alt="Dana">
                    <span>Dana</span>
                </div>

                <div class="payment-method" onclick="selectPayment(this)">
                    <img src="https://logodownload.org/wp-content/uploads/2014/09/bca-logo-0.png" alt="BCA">
                    <span>BCA</span>
                </div>
            </div>

            <!-- Summary -->
            <div class="payment-summary">
                <p><span>Total Belanja</span> <strong>Rp 120.000</strong></p>
                <p><span>Metode</span> <strong id="payment-selected">-</strong></p>
            </div>

            <!-- Submit -->
            <button type="submit" class="payment-btn">
                <i class="fas fa-credit-card"></i> Bayar Sekarang
            </button>
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
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>