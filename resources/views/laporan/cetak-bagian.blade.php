<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Ekspedisi & Disposisi - KPU Provinsi Bengkulu</title>
    <style>
        /* Menggunakan font standar dokumen resmi pemerintahan */
        body { font-family: 'Times New Roman', Times, serif; font-size: 12px; color: black; line-height: 1.5; }
        
        /* 1. Styling Kop Surat */
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 10px;
        }
        .kop-surat img {
            width: 85px; /* Ukuran proporsional logo */
            height: auto;
            margin-right: 20px;
        }
        .teks-kop {
            flex: 1;
        }
        .teks-kop h2 { margin: 0; font-size: 18px; text-transform: uppercase; letter-spacing: 1px; }
        .teks-kop h1 { margin: 0; font-size: 22px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; }
        .teks-kop p { margin: 0; font-size: 12px; }
        
        /* 2. Garis Ganda di Bawah Kop Surat */
        .garis-ganda {
            border-bottom: 5px double black;
            margin-bottom: 20px;
        }

        /* 3. Styling Judul Laporan */
        .judul-laporan { text-align: center; margin-bottom: 20px; }
        .judul-laporan h3 { margin: 0; font-size: 16px; text-decoration: underline; }
        .judul-laporan p { margin: 5px 0 0 0; font-size: 11px; font-style: italic; }

        /* 4. Styling Tabel Data */
        table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #e2e8f0; text-align: center; font-weight: bold; text-transform: uppercase; font-size: 11px;}
        .text-center { text-align: center; }

        /* 5. Styling Kolom Tanda Tangan */
        .signature-container {
            width: 100%;
            display: flex;
            justify-content: flex-end; /* Memosisikan tanda tangan di kanan bawah */
            margin-top: 30px;
        }
        .signature-box {
            text-align: center;
            width: 250px;
        }
        .signature-box p { margin: 0; }
        .nama-terang {
            font-weight: bold;
            text-decoration: underline;
            margin-top: 70px; /* Memberi ruang kosong untuk tanda tangan basah */
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/KPU_Logo.svg/500px-KPU_Logo.svg.png" alt="Logo KPU">
        <div class="teks-kop">
            <h2>KOMISI PEMILIHAN UMUM</h2>
            <h1>PROVINSI BENGKULU</h1>
            <p>Jl. Kapuas Raya No.82, Padang Harapan, Kec. Gading Cempaka, Kota Bengkulu 38225</p>
            <p>Email: prov_bengkulu@kpu.go.id | Laman: bengkulu.kpu.go.id</p>
        </div>
    </div>
    
    <div class="garis-ganda"></div>

    <div class="judul-laporan">
        <h3>LAPORAN PENERIMAAN SURAT MASUK INTERNAL BAGIAN</h3>
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">No. Surat</th>
                <th width="12%">Tgl Masuk</th>
                <th width="20%">Pengirim</th>
                <th width="15%">Bagian Tujuan</th>
                <th width="23%">Instruksi Disposisi</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekspedisis as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $item->surat->nomor_surat ?? '-' }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($item->surat->tanggal_masuk)->format('d-M-Y') ?? '-' }}</td>
                <td>{{ $item->surat->pengirim ?? '-' }}</td>
                <td>{{ $item->bagian->nama_bagian ?? '-' }}</td>
                <td>{{ $item->disposisi ?? '-' }}</td>
                <td class="text-center">{{ $item->status ?? 'Selesai' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature-container">
        <div class="signature-box">
            <p>Bengkulu, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
            <p>Mengetahui,</p>
            <p>Staf Penerima Dokumen</p>
            
            <div class="nama-terang">{{ auth()->user()->name ?? 'Administrator' }}</div>
            <p>NIP. ........................................</p>
        </div>
    </div>

    <script>
        // Menggunakan setTimeout 500ms agar logo KPU sempat di-download dari internet sebelum dialog Print muncul
        setTimeout(function() {
            window.print();
        }, 500);
    </script>

</body>
</html>