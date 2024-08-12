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

        .back-button-container {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #ffffff;
            background-color: #343a40;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover {
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
            <p style="margin-top: 0;">Kepala Gudang Lini III ........................<br> di <br> Tempat</p>
        </div>
        <div class="text-center my-3">
            <center>
                <h3><ins>Surat Permintaan Muat Alokasi Non Subsidi</ins></h3>
                <p>No. : <span class="editable no-border">[Invoice Number] / HU / SPM / [Invoice Date]</span></p>
            </center>
        </div>
        <br>
        <div class="my-2">
            <div>Truk No. Polisi : <span class="editable no-border">[No Polisi]</span></div>
            <div>Nama Pengemudi : <span class="editable no-border">[Salesman]</span></div>
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
                    <td class="editable">[No]</td>
                    <td class="editable">[Item Description]</td>
                    <td class="editable">[Invoice Number]</td>
                    <td class="editable">[Invoice Date]</td>
                    <td class="editable">[Quantity]</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-center"></td>
                    <td class="editable">[Total]</td>
                </tr>
            </tbody>
        </table>
        <div class="mt-5">
            <div>
                <p>Cikampek, <span class="editable no-border">[Invoice Date]</span></p>
                <br>
                <br>
                <p>( ............................................... )</p>
            </div>
        </div>
    </div>
    <div class="back-button-container">
        <a href="/forms" class="btn-back">Back</a>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>