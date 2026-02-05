<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Surat - {{ $surat->nama_pemohon }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; padding: 40px; }
        .container { max-width: 800px; margin: auto; }
        .header { text-align: center; border-bottom: 3px double black; padding-bottom: 10px; margin-bottom: 20px; }
        .header h2, .header h3 { margin: 0; }
        .content { line-height: 1.6; text-align: justify; }
        .ttd { float: right; width: 250px; text-align: center; margin-top: 50px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="no-print" style="margin-bottom: 20px; padding: 10px 20px; background: blue; color: white; border: none; cursor: pointer;">🖨️ Cetak Surat Ini</button>

    <div class="container">
        <div class="header">
            <h3>PEMERINTAH KABUPATEN KATINGAN</h3>
            <h3>KECAMATAN KATINGAN HILIR</h3>
            <h2>DESA DIGITAL KATINGAN</h2>
            <p>Jl. Kantor Desa No. 1, Kode Pos 74411</p>
        </div>

        <div class="content">
            <h3 style="text-align: center; text-decoration: underline; text-transform: uppercase;">{{ $surat->jenis_surat }}</h3>
            <p style="text-align: center;">Nomor: 140 / {{ $surat->id }} / DS-KTG / {{ date('Y') }}</p>

            <p>Yang bertanda tangan di bawah ini Kepala Desa Katingan, Kecamatan Katingan Hilir, Kabupaten Katingan, menerangkan dengan sebenarnya bahwa:</p>

            <table style="width: 100%; margin-left: 20px;">
                <tr>
                    <td style="width: 150px;">Nama</td>
                    <td>: <strong>{{ $surat->nama_pemohon }}</strong></td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>: {{ $surat->nik_pemohon }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: Desa Katingan RT.001 RW.002</td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>: {{ $surat->keterangan }}</td>
                </tr>
            </table>

            <p>Orang tersebut di atas adalah benar-benar warga Desa Katingan dan berkelakuan baik. Surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>
            
            <p>Demikian surat keterangan ini dibuat agar dapat dipergunakan seperlunya.</p>

            <div class="ttd">
                <p>Katingan, {{ date('d F Y') }}</p>
                <p>Kepala Desa Katingan</p>
                <br><br><br><br>
                <p><strong>( NAMA KEPALA DESA )</strong></p>
            </div>
        </div>
    </div>

</body>
</html>