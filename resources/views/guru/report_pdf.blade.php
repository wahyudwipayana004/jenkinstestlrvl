<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan_Kejadian_{{ $report->id }}</title>
    <style>
        /* Pengaturan Kertas A4 */
        @page { 
            margin: 2.54cm; /* Standar Margin 1 Inci */
        }
        
        body { 
            /* Mendefinisikan Times New Roman */
            font-family: "Times New Roman", Times, serif; 
            font-size: 12pt; 
            color: #000; 
            line-height: 1.5;
        }

        /* Kop Surat Resmi */
        .header { 
            text-align: center; 
            margin-bottom: 20px; 
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }
        .header h1 { 
            margin: 0; 
            font-size: 14pt; 
            text-transform: uppercase; 
        }
        .header p { 
            margin: 0; 
            font-size: 11pt; 
        }

        .report-title { 
            text-align: center; 
            font-weight: bold; 
            text-decoration: underline;
            margin-bottom: 30px;
            font-size: 12pt;
        }

        /* Tabel Data Laporan */
        .info-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 20px; 
        }
        .info-table td { 
            padding: 5px 0;
            vertical-align: top;
        }
        .label { 
            width: 35%; 
        }
        .separator { 
            width: 3%; 
        }
        .value { 
            width: 62%; 
            font-weight: bold;
        }

        /* Bagian Kronologi */
        .kronologi-header {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 5px;
        }
        .kronologi-box {
            text-align: justify;
            border: 1px solid #000;
            padding: 10px;
            min-height: 150px;
        }

        /* Tanda Tangan */
        .signature-table {
            margin-top: 50px;
            width: 100%;
        }
        .signature-table td {
            width: 50%;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>DINAS PENDIDIKAN DAN KEBUDAYAAN</h1>
        <h1>{{ strtoupper($report->school->nama_sekolah ?? 'NAMA SEKOLAH') }}</h1>
        <p>{{ $report->school->alamat ?? 'Alamat sekolah belum diatur di database.' }}</p>
    </div>

    <div class="report-title">LAPORAN PENANGANAN KASUS PERUNDUNGAN</div>

    <table class="info-table">
        <tr>
            <td class="label">Nomor Laporan</td>
            <td class="separator">:</td>
            <td class="value">#REP-{{ str_pad($report->id, 5, '0', STR_PAD_LEFT) }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Lapor</td>
            <td class="separator">:</td>
            <td class="value">{{ $report->created_at->format('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Kategori Perundungan</td>
            <td class="separator">:</td>
            <td class="value">{{ $report->jenis_bullying }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Kejadian</td>
            <td class="separator">:</td>
            <td class="value">{{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Lokasi Kejadian</td>
            <td class="separator">:</td>
            <td class="value">{{ $report->lokasi_kejadian }}</td>
        </tr>
        <tr>
            <td class="label">Nama Terduga Pelaku</td>
            <td class="separator">:</td>
            <td class="value">{{ strtoupper($report->nama_pelaku ?? 'RAHASIA') }}</td>
        </tr>
        <tr>
            <td class="label">Identitas Pelapor</td>
            <td class="separator">:</td>
            <td class="value">{{ $report->is_anonymous ? 'ANONIM' : strtoupper($report->user->name) }}</td>
        </tr>
        <tr>
            <td class="label">Status Saat Ini</td>
            <td class="separator">:</td>
            <td class="value">{{ strtoupper($report->status) }}</td>
        </tr>
    </table>

    <div class="kronologi-header">Kronologi Kejadian:</div>
    <div class="kronologi-box">
        {{ $report->deskripsi }}
    </div>

    <table class="signature-table">
        <tr>
            <td>
                <br>
                Pelapor,
                <br><br><br><br>
                ( {{ $report->is_anonymous ? 'Hamba Allah' : $report->user->name }} )
            </td>
            <td>
                {{ $report->school->alamat ?? 'Lokasi' }}, {{ date('d F Y') }}<br>
                Guru BK / Petugas,
                <br><br><br><br>
                ( ________________________ )
            </td>
        </tr>
    </table>

</body>
</html>