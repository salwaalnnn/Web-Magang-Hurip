<!DOCTYPE html>
<html>
<head>
    <title>Edit Perusahaan</title>
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

        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #dddddd;
            border-radius: 5px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Perusahaan</h1>
        <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="logo">Logo</label>
                <input type="file" id="logo" name="logo">
            </div>
            <div class="form-group">
                <label for="namaperusahaan">Nama Perusahaan</label>
                <input type="text" id="namaperusahaan" name="namaperusahaan" value="{{ $company->namaperusahaan }}">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" value="{{ $company->alamat }}">
            </div>
            <div class="form-group">
                <label for="notelp">No Telp</label>
                <input type="text" id="notelp" name="notelp" value="{{ $company->notelp }}">
            </div>
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" id="fax" name="fax" value="{{ $company->fax }}">
            </div>

            <div class="button-container">
                <a href="/" class="btn btn-dark">Back</a>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>
</html>