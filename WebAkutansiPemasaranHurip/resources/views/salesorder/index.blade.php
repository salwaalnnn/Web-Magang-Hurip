<!DOCTYPE html>
<html>
<head>
    <title>Sales Orders</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #28a745;
            color: white;
            text-align: center;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            display: inline-block;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-dark {
            background-color: #343a40;
        }

        .btn:hover {
            opacity: 0.8;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        .form-group {
            display: flex;
            align-items: center;
        }

        .form-label {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sales Orders</h1>
            <div class="form-group">
                <label for="id_Form" class="form-label">Form</label>
                <select name="id_Form" id="id_Form" class="form-control" required>
                    @foreach($form as $f)
                        <option value="{{ $f->id }}">{{ $f->formdesign }}</option>
                    @endforeach
                </select>
                <a href="{{ route('salesorders.create') }}" class="btn btn-primary">Tambah Sales Order</a>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>No. SO</th>
                    <th>Tanggal SO</th>
                    <th>Customer</th>
                    <th>Produk</th>
                    <th>Tonase Muat</th>
                    <th>Satuan</th>
                    <th>Diskon (%)</th>
                    <th>Pajak (%)</th>
                    <th>Total</th>
                    <th>Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salesorders as $so)
                    <tr>
                        <td>{{ $so->No_SO }}</td>
                        <td>{{ $so->tglSO }}</td>
                        <td>{{ $so->customer->namacustomer }}</td>
                        <td>{{ $so->produk->namaproduk }}</td>
                        <td>{{ $so->tonase }}</td>
                        <td>{{ $so->satuan }}</td>
                        <td>{{ $so->diskon }}</td>
                        <td>{{ $so->pajak }}</td>
                        <td>{{ $so->total }}</td>
                        <td>
                            <button class="btn btn-info" onclick="printForm({{ $so->id }})">Cetak</button>
                            <form action="{{ route('salesorders.destroy', $so->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="&#128465">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/" class="btn btn-dark">Back</a>
    <script>
        function printForm(salesOrderId) {
            var formId = document.getElementById('id_Form').value;
            var url = `/form/preview/${formId}/${salesOrderId}/0`; 
            window.location.href = url;
        }
    </script>
</body>
</html>
