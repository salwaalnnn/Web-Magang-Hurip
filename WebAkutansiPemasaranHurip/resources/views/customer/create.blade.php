<!DOCTYPE html>
<html>
<head>
    <title>Tambah Customer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            display: inline-block.
        }

        .btn-success {
            background-color: #28a745;
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
        <h1>Add Customer</h1>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div>
                <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" name="namaperusahaan" class="form-control" id="namaperusahaan" required>
            </div>
            <div>
                <label for="namacustomer" class="form-label">Nama Customer</label>
                <input type="text" name="namacustomer" class="form-control" id="namacustomer" required>
            </div>
            <div>
                <label for="notelp" class="form-label">No. Telp</label>
                <input type="text" name="notelp" class="form-control" id="notelp" required>
            </div>
            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div>
                <label for="kota" class="form-label">Kota</label>
                <input type="text" name="kota" class="form-control" id="kota" required>
            </div>
            <div>
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="4" required></textarea>
            </div>
            <div>
                <label for="alamat_gudang" class="form-label">Alamat Gudang</label>
                <textarea name="alamat_gudang" class="form-control" id="alamat_gudang" rows="4" required></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Save">
        </form>
    </div>
    <a href="/customers" class="btn btn-dark">Back</a>
</body>
</html>