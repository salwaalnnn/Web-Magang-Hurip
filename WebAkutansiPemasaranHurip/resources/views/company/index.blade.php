<!DOCTYPE html>
<html>
<head>
    <title>Detail Perusahaan</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th, td {
            padding: 12px;
        }

        th {
            background-color: #28a745;
            color: white;
            width: 20%; /* Adjusting the width of the left column */
            text-align: center;
        }

        td {
            width: 70%; /* Adjusting the width of the right column */
            background-color: #f9f9f9;
            text-align: left;
        }

        .btn {
            padding: 10px 20px;
            margin: 20px 10px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            display: inline-block;
            text-align: center;
            background-color: #343a40;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-dark {
            background-color: #343a40;
        }

        .table-container {
            display: flex;
            justify-content: center;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        /* Centering the logo in the table cell */
        .logo-cell {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Perusahaan</h1>
        <div class="table-container">
            <table>
                <tr>
                    <th>Logo</th>
                    <td class="logo-cell">
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="170">
                    </td>
                </tr>
                <tr>
                    <th>Nama Perusahaan</th>
                    <td>{{ $company->namaperusahaan ?? '' }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $company->alamat ?? '' }}</td>
                </tr>
                <tr>
                    <th>No. Telp</th>
                    <td>{{ $company->notelp ?? '' }}</td>
                </tr>
                <tr>
                    <th>Fax</th>
                    <td>{{ $company->fax ?? '' }}</td>
                </tr>
            </table>
        </div>
        <div class="button-container">
            <a href="/" class="btn btn-dark">Back</a>
            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-dark">Edit</a>
        </div>
    </div>
</body>
</html>