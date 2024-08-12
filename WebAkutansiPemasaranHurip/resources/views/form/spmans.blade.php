<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permintaan Muat</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            position: relative;
        }

        .page {
            width: 164mm;
            height: 212mm;
            border: 1px solid #000;
            padding: 12mm;
            box-sizing: border-box;
            background-color: #ffffff;
            position: relative;
        }

        .editable {
            border: 1px solid #000;
            min-height: 20px;
            padding: 2px;
        }

        .no-border {
            border: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #0000;
            color: black;
        }

        td {
            height: 20px; /* Default height for rows */
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .justify-content-end {
            justify-content: flex-end;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .mt-2 {
            margin-top: 0.5rem;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .my-2 {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .my-3 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .align-items-center {
            align-items: center;
        }

        .ml-3 {
            margin-left: 3rem;
        }

        .mr-3 {
            margin-right: 1rem;
        }

        .company-name {
            font-size: 18px; 
            font-weight: bold;
        }

        .rowtengah {
            height: 150px; 
        }

        .button-container {
            position: absolute;
            width: 100%;
            bottom: 20px;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .btn-back, .btn-print {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #ffffff;
            background-color: #343a40;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .btn-back:hover, .btn-print:hover {
            background-color: #23272b;
        }

    </style>
</head>
<body>
    <div class="page">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('storage/images/logo.jpg') }}" alt="Company Logo" width="80" class="mr-3">
            <div class="text-left">
                <div class="company-name">PT. HURIP UTAMA</div>
                Jl. Jend. A Yani No.39 - Cikampek 41373<br>
                Telp. : (0264) 316 332 - 303552 - 303553<br>
                Faxs : (0264) 313 460
            </div>
        </div>
        <hr size="3" color="black" noshade>
        <div class="mt-3">
            <p style="margin-bottom: 0;">Kepada Yth,</p>
            <p style="margin-top: 0;">Kepala Gudang Lini III {{ $surat->nm_kepalagudang }}.<br> di <br> Tempat</p>
        </div>
        <div class="text-center my-3">
            <center>
                <h3><ins>Surat Permintaan Muat Alokasi Non Subsidi</ins></h3>
                <p>No. : <span class="editable no-border">{{ $surat->no_inv }} / HU / SPM / {{ $surat->tgl_inv }}</span></p>
            </center>
        </div>
        <br>
        <div class="my-2">
            <div>Truk No. Polisi : <span class="editable no-border">{{ $surat->nopolisi }}</span></div>
            <div>Nama Pengemudi : <span class="editable no-border">{{ $surat->nm_pengemudi }}</span></div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Jenis Produk</th>
                    <th>No. SO</th>
                    <th>Tanggal SO</th>
                    <th>Tonase Muat (Kg)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="rowtengah">
                    <td class="editable">1</td>
                    <td class="editable">{{ $salesOrder->produk->namaproduk }}</td>
                    <td class="editable">{{ $salesOrder->No_SO }}</td>
                    <td class="editable">{{ $salesOrder->tglSO }}</td>
                    <td class="editable">{{ $salesOrder->tonase }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center"></td>
                    <td class="editable">{{ $salesOrder->total }}</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <div>
                <p>Cikampek, <span class="editable no-border">{{ $surat->tgl_inv }}</span></p>
                <br>
                <br>
                <p>( {{ $surat->nm_pengirimsurat }} )</p>
            </div>
        </div>
    </div>
    <div class="button-container">
        <a href="/spmans" class="btn-back">Back</a>
        <button onclick="window.print()" class="btn-print">Print</button>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
