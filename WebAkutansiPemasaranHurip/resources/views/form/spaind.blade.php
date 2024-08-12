<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Alokasi Industri</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .page {
            width: 164mm;
            height: 212mm;
            border: 1px solid #000;
            padding: 12mm;
            box-sizing: border-box;
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 14px;
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

        .large-size {
            padding: 8px;
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

        .table-desc {
            margin-top: 5px;
        }

        .table-desc td {
            border: none;
            padding: 2px;
            text-align: left;
        }

        .table-desc td:first-child {
            text-align: left;
        }

        .table-desc tr {
            height: 2px;
        }

        th {
            background-color: #f0f0f0;
            color: black;
        }

        td {
            height: 20px;
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

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        ul {
            padding: 10px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        li {
            padding-bottom: 8px;
        }

        p{
            margin-bottom: 0px;
            margin-top: 0px;
        }

        h2{
            margin: 0px;
        }

        h3{
            margin: 0px;
        }

        footer {
            position: absolute;
            bottom: 20mm;
            left: 12mm;
            right: 12mm;
            display: flex;
            justify-content: space-between;
        }
        
        .back-button-container {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .print-button-container {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .btn-back, .btn-print {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #ffffff;
            background-color: #343a40;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover, .btn-print:hover {
            background-color: #23272b;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="d-flex justify-content-between align-items-center">
            <div class="text-left" style="display: flex; align-items: center;">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="Company Logo" width="80" style="margin-right: 10px;">
                <div>
                    <strong style="font-size: 18px;">PT. Hurip Utama</strong><br>
                    <span style="font-size: 12px;">
                        Jl. Jend. A Yani No.39 - Cikampek 41373<br>
                        Telp.: (0264) 316332 - 303552 - 303553<br>
                        Faks.: (0264) 313 460
                    </span>
                </div>
            </div>
            <div class="text-left">
                <strong>No. </strong><span class="editable large-size">{{ $spaind->no_inv }}</span>
            </div>
        </div>
        <div class="text-center my-3">
            <h2>SURAT PENGANTAR</h2>
            <hr size="1" color="black" noshade style="width: 40%;">
            <h3>ALOKASI INDUSTRI</h3>
        </div>
        <div class="table-desc">
            <table class="table-desc no-border">
                <tr>
                    <td style="width: 150px;">Nomor Pol. Kendaraan</td>
                    <td>: {{ $spaind->nopolisi }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $spaind->tgl_inv }}</td>
                </tr>
                <tr>
                    <td>Delivery Order Nomor</td>
                    <td>: {{ $deliveryOrder->no_DO }} Party <span class="editable no-border">{{ $spaind->party }} Ton/Kg/Dus</span></td>
                </tr>
                <tr>
                    <td style="text-align:right;">Tanggal</td>
                    <td>: {{ $deliveryOrder->tgl_DO }}</td>
                </tr>
                <tr>
                    <td>Gudang Tujuan </td>
                    <td>: {{ $salesOrder->customer->alamat_gudang }}</td>
                </tr>
                <tr>
                    <td>Kabupaten / Kota</td>
                    <td>: {{ $salesOrder->customer->kota }}</td>
                </tr>
            </table>
        </div>
        <table class='isi'>
            <thead>
                <tr>
                    <th rowspan="2" style="width: 30px;">Jenis Barang</th>
                    <th rowspan="2" style="width: 10px;">Merk / ex Pabrik</th>
                    <th colspan="2" style="width: 14px;" class="text-center"><strong>Banyaknya</strong></th>
                    <th rowspan="2" style="width: 200px;">Keterangan</th>
                </tr>
                <tr>
                    <th style="width: 7px;">Ton</th>
                    <th style="width: 7px;">Zak</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="editable">{{ $salesOrder->produk->namaproduk }}</td>
                    <td>PT PUPUK KUJANG</td>
                    <td class="editable">{{ $salesOrder->ton }}</td>
                    <td class="editable">{{ $salesOrder->zak }}</td>
                    <td>
                        <ul>
                            <li>RUSAK ......... Zak = ......... Kg</li>
                            <li>HILANG ......... Zak = ......... Kg</li>
                            <li>LEBIH ......... Zak = ......... Kg</li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <footer>
            <div class="text-center">
                Diterima Oleh,<br><br><br><br>
                <div class="editable no-border">{{ $salesOrder->customer->namacustomer }}</div>
                <p>Tgl. ............................</p>
            </div>
            <div class="text-center">
                Dikirim Oleh,<br><br><br><br>
                <div class="editable no-border">{{ $spaind->nm_pengirim }}</div>
                <p>Tgl. ............................</p> 
            </div>
        </footer>
    </div>
    <div class="back-button-container">
        <a href="/spaind" class="btn-back">Back</a>
    </div>
    <div class="print-button-container">
        <button class="btn-print" onclick="window.print()">Print</button>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>