<!DOCTYPE html>
<html>
<head>
    <title>PDF с QR-кодом</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; text-align: center; }
        .qr-section { margin-top: 50px; }
    </style>
</head>
<body>
<h1>Ваш QR-код</h1>

<div class="qr-section">
    <!-- Вставка сгенерированной Base64 строки -->
    <img src="{{ $qrCode }}" alt="QR Code" width="150">
</div>

<p>Отсканируйте код для получения информации.</p>
</body>
</html>
