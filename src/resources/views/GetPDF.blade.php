<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; }
        .qr-table {
            width: 100%;
            border-collapse: collapse;
        }
        .qr-table td {
            width: 33.3%;
            padding: 15px;
            text-align: center;
            border: 1px solid #eee; /* Опционально: рамки для кодов */
        }
        .label {
            font-size: 10px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<h2 style="text-align: center;">Лист QR-кодов (12 шт.)</h2>

<table class="qr-table">
    @foreach(array_chunk($qrCodes, 3) as $row) {{-- Делим массив по 3 штуки в ряд --}}
    <tr>
        @foreach($row as $qr)
            <td>
                <img src="{{ $qr->qr }}" width="120">
                <div class="label">Код №{{ $qr->id }}</div>
            </td>
        @endforeach
    </tr>
    @endforeach
</table>
</body>
</html>
