<!DOCTYPE html>
<html>
<head>
    <title>Rekap Laporan - {{ $school->nama_sekolah }}</title>
    <style>
        body { font-family: "Times New Roman", serif; font-size: 11pt; }
        .header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; font-weight: bold; text-align: center; }
        .footer { margin-top: 30px; text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin:0;">REKAPITULASI LAPORAN PERUNDUNGAN (BULLYING)</h2>
        <h3 style="margin:5px 0 0 0;">{{ strtoupper($school->nama_sekolah) }}</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="20%">Kategori</th>
                <th width="20%">Nama Pelaku</th>
                <th width="15%">Status</th>
                <th width="25%">Kronologi Singkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $index => $report)
            <tr>
                <td style="text-align:center;">{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d/m/Y') }}</td>
                <td>{{ $report->jenis_bullying }}</td>
                <td>{{ $report->nama_pelaku ?? 'Rahasia' }}</td>
                <td style="text-align:center;">{{ $report->status }}</td>
                <td>{{ Str::limit($report->deskripsi, 50) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak pada: {{ date('d/m/Y H:i') }}</p>
        <br><br><br>
        <p>( Admin Dinas Pendidikan )</p>
    </div>
</body>
</html>