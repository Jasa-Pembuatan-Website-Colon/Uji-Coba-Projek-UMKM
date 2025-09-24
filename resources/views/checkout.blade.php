<!DOCTYPE html>
<html>
<head>
    <title>Checkout Midtrans</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" 
            data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <h2>Checkout Order: {{ $orderId }}</h2>
    <p>Total Bayar: Rp {{ number_format($amount, 0, ',', '.') }}</p>

    <button id="pay-button">Bayar Sekarang</button>

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
                    alert('Kamu menutup popup tanpa menyelesaikan pembayaran');
                }
            });
        });
    </script>
</body>
</html>
