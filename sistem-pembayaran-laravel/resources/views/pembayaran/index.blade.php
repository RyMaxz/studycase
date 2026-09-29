<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Simulasi Sistem Pembayaran</title>
</head>
<body>
    <h1>Simulasi Sistem Pembayaran</h1>
    <p>Jumlah transaksi: <strong>Rp{{ number_format($jumlah, 0, ',', '.') }}</strong></p>

    <ul>
        @foreach ($hasil as $nama => $pesan)
            <li>
                <strong>{{ $nama }}:</strong> {{ $pesan }}
            </li>
        @endforeach
    </ul>
</body>
</html>