<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Status Partnership</title>
</head>

<body>
    <p>Halo {{ $partnership->nama }},</p>

    <p>Terima kasih atas pengajuan partnership Anda dengan perihal: <strong>{{ $partnership->perihal }}</strong>.</p>

    <p>Status pengajuan Anda telah diperbarui menjadi:
        <strong>{{ $partnership->status }}</strong>.
    </p>

    <p>Kode Tiket Anda: <strong>{{ $partnership->kode_tiket }}</strong></p>

    <p>Salam,<br>
        PT. Daya Cahya Abadi</p>
</body>

</html>