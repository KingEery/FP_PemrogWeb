<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Kompetensi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .certificate-container {
            width: 100%;
            padding: 20px;
            text-align: center;
            border: 5px solid #5E35B1;
            border-radius: 10px;
        }
        .certificate-title {
            font-size: 24px;
            font-weight: bold;
            color: #5E35B1;
        }
        .recipient-name {
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
            color: #333;
        }
        .certificate-text {
            font-size: 16px;
            color: #555;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <h1 class="certificate-title">SERTIFIKAT KOMPETENSI</h1>
        <p class="certificate-text">Dengan bangga diberikan kepada:</p>
        <p class="recipient-name">{{ $name }}</p>
        <p class="certificate-text">
            Atas pencapaian luar biasa dalam menyelesaikan program pembelajaran
            <strong>{{ $course }}</strong>.
        </p>
        <p class="certificate-text">Tanggal: {{ $date }}</p>
        <p class="certificate-text">Kode Sertifikat: {{ $code }}</p>
        <div class="footer">
            <p>Sertifikat ini berlaku selama 3 tahun sejak tanggal penerbitan.</p>
        </div>
    </div>
</body>
</html>