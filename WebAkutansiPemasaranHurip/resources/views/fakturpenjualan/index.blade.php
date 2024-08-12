<!DOCTYPE html>
<html>
<head>
    <title>Sales Invoice</title>
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
            text-align: center;
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
        <h1>Faktur Penjualan</h1>
        <table>
            <thead>
                <tr>
                    <th>No. SO</th>
                    <th>No. Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Preview</th>
                    <th>Process</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice as $inv)
                    <tr>
                        <td>{{ $inv->salesOrders->No_SO }}</td>
                        <td>{{ $inv->no_inv }}</td>
                        <td>{{ $inv->tgl_inv }}</td>
                        <td>
                            <button class="btn btn-info" onclick="printForm({{ $inv->id_form }}, {{ $inv->id_SO }}, {{ $inv->id }})">Lihat</button>
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('invoice.edit', $inv->id) }}">Edit</a>
                            <form action="{{ route('invoice.destroy', $inv->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="&#128465;">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/" class="btn btn-dark">Back</a>
    <script>
        function printForm(formId, salesOrderId, invoiceId) {
            var url = `/form/preview/${formId}/${salesOrderId}/${invoiceId}`;
            window.location.href = url;
        }
    </script>
</body>
</html>
