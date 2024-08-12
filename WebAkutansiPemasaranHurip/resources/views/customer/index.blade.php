<!DOCTYPE html>
<html>
<head>
    <title>Customer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Customer List</h1>
        <a class="btn btn-primary" href="{{ route('customers.create') }}">Tambah Customer</a>
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Alamat Gudang</th>
                <th>Proses</th>
            </tr>
            @foreach($customers as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->namaperusahaan }}</td>
                <td>{{ $c->notelp }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->alamat }}</td>
                <td>{{ $c->alamat_gudang }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('customers.edit', $c->id) }}">Edit</a>
                    <form action="{{ route('customers.destroy', $c->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="&#128465">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <a href="/" class="btn btn-dark">Back</a>
</body>
</html>