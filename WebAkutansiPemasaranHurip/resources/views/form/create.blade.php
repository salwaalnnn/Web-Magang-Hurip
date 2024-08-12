<!DOCTYPE html>
<html>
<head>
    <title>Tambah Form</title>
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
        <h1>Add Form</h1>
        <form action="{{ route('forms.store') }}" method="POST">
            @csrf
            <div>
                <label for="formdesign" class="form-label">Nama Form</label>
                <input type="text" name="formdesign" class="form-control" id="formdesign" required>
            </div>
            <div>
                <label for="jenisform" class="form-label">Jenis Form</label>
                <select name="jenisform" id="jenisform" class="form-control">
                    <option value="SO">SO</option>
                    <option value="DO">DO</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Save">
        </form>
    </div>
    <a href="/forms" class="btn btn-dark">Back</a>
</body>
</html>