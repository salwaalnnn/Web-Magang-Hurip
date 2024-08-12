<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        .body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 50%;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .btn {
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
            display: inline-block;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
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

        textarea.form-control {
            resize: vertical;
        }

        .form-label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .back-button {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Customer</h1>
        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="namaperusahaan" class="form-label">Nama Perusahaan</label>
                <input type="text" name="namaperusahaan" class="form-control" id="namaperusahaan" value="{{ $customer->namaperusahaan }}" required>
            </div>
            <div class="form-group">
                <label for="namacustomer" class="form-label">Nama Customer</label>
                <input type="text" name="namacustomer" class="form-control" id="namacustomer" value="{{ $customer->namacustomer }}" required>
            </div>
            <div class="form-group">
                <label for="notelp" class="form-label">No. Telp</label>
                <input type="text" name="notelp" class="form-control" id="notelp" value="{{ $customer->notelp }}" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $customer->email }}" required>
            </div>
            <div class="form-group">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" name="kota" class="form-control" id="kota" value="{{ $customer->kota }}" required>
            </div>
            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="4" required>{{ $customer->alamat }}</textarea>
            </div>
            <div class="form-group">
                <label for="alamat_gudang" class="form-label">Alamat Gudang</label>
                <textarea name="alamat_gudang" class="form-control" id="alamat_gudang" rows="4" required>{{ $customer->alamat_gudang }}</textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Update">
        </form>
    </div>
    <a href="/customers" class="btn btn-dark">Back</a>
</body>
</html>
