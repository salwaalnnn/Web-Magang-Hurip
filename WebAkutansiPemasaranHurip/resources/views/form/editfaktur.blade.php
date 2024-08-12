<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Template</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin-top: 0px;
            position: relative;
        }

        .page {
            width: 212mm; 
            height: 164mm; 
            border: 1px solid #000;
            padding: 12mm;
            box-sizing: border-box;
            background-color: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header, .footer, .content {
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0px;
        }

        .header .companynama{
            font-size: 18px;
        }

        .header .company-info {
            text-align: left;
            margin-bottom: 50px;
        }

        .header .company-info div {
            text-align: left;
            margin-top: 2px;
        }

        .header table {
            text-align: right;
            width: 41.8%;
        }

        .company-info img {
            width: 80px;
            vertical-align: middle;
        }

        .header table, .header th, .header td {
            border: 1px solid #000;
            padding: 2px;
        }

        .header table td:first-child {
            border-left: none;
            text-align: left;
        }

        .header table td:second-child {
            border-right: none; 
            text-align: left;
        }

        .header table td:not(:first-child) {
            text-align: left;
        }

        .editable {
            border: 1px solid #000;
            padding: 2px;
            min-height: 20px;
            display: inline-block;
        }

        .table-container {
            width: 100%;
            margin: 0px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0f0f0;
        }

        .footer {
            margin-top: 10px;
        }

        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .signature div {
            text-align: center;
            margin-top: 10px;
            margin-left: 15px;
            margin-right: 15px;
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
        <div class="header">
            <div class="company-info">
                <img src="{{ asset('storage/images/logo.jpg') }}" alt="Company Logo">
                <div class='companynama' contenteditable="true" style="display: inline-block; margin-left: 10px;"><strong>PT. HURIP UTAMA</strong></div>
                <div contenteditable="true">Jl. Jend. A Yani No.39 Cikampek 41373</div>
                <div contenteditable="true">Telp: (0264) 316 332 - 303552 - 303553</div>
                <div contenteditable="true">Fax: (0264) 313 460</div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th colspan="2" class="text-center"><strong>FAKTUR PENJUALAN</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 78px;" contenteditable="true">No. Faktur :</td>
                        <td contenteditable="true">[Invoice Number]</td>
                    </tr>
                    <tr>
                        <td style="width:78px;" contenteditable="true">Tanggal :</td>
                        <td contenteditable="true">[Invoice Date]</td>
                    </tr>
                    <tr>
                        <td style="width: 78px;" contenteditable="true">Payment :</td>
                        <td contenteditable="true">[Payment]</td>
                    </tr>
                    <tr>
                        <td style="width: 78px;" contenteditable="true">Nama Kios :</td>
                        <td contenteditable="true">[Nama Kios]</td>
                    </tr>
                    <tr>
                        <td style="width: 78px;" contenteditable="true">Pemilik :</td>
                        <td contenteditable="true">[Customer Name]</td>
                    </tr>
                    <tr>
                        <td style="width: 78px;" contenteditable="true">Telp/HP :</td>
                        <td contenteditable="true">[Phone]</td>
                    </tr>
                    <tr>
                        <td style="width: 78px;" contenteditable="true">Alamat :</td>
                        <td contenteditable="true">[Address]</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th style="width: 10px;">No.</th>
                        <th style="width: 50px;">No. FPB</th>
                        <th style="width: 50px;">Tgl. SO</th>
                        <th style="width: 50px;">No. SO</th>
                        <th style="width: 75px;">Jenis Produk</th>
                        <th style="width: 50px;">Tonase (kg)</th>
                        <th style="width: 60px;">Harga (Rp)</th>
                        <th style="width: 75px;">Jumlah (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td contenteditable="true">[No]</td>
                        <td contenteditable="true">[No FPB]</td>
                        <td contenteditable="true">[Tgl SO]</td>
                        <td contenteditable="true">[SONo]</td>
                        <td contenteditable="true">[Item Description]</td>
                        <td contenteditable="true">[Quantity]</td>
                        <td contenteditable="true">[Unit Price]</td>
                        <td contenteditable="true">[Amount]</td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: left;">Catatan: <span contenteditable="true">[Catatan]</span></td>
                        <td><strong>Jumlah Total</strong></td>
                        <td contenteditable="true">[Total]</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <div class="signature">
                <div>
                    <div>Pembeli</div><br><br><br><br>
                    <div contenteditable="true">([Customer Name])</div>
                </div>
                <div>
                    <div>Sales</div><br>
                    <br>
                    <br><br>
                    <div contenteditable="true">([Nama Pengirim])</div>
                </div>
            </div>
        </div>
    </div>
    <div class="back-button-container">
        <a href="/forms" class="btn-back">Back</a>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
