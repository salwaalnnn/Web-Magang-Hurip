<!DOCTYPE html>
<html>
<head>
    <title>Edit SPANSUB</title>
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
            display: inline-block;
        }

        .btn-primary {
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
        <h1>Edit Surat Pengantar Alokasi Non Subsidi</h1>
        <form action="{{ route('spansub.update', $spansub->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="no_inv" class="form-label">No. Invoice</label>
                <input type="text" name="no_inv" class="form-control" id="no_inv" value="{{ $spansub->no_inv }}" required>
            </div>
            <div>
                <label for="tgl_inv" class="form-label">Tanggal Invoice</label>
                <input type="date" name="tgl_inv" class="form-control" id="tgl_inv" value="{{ $spansub->tgl_inv }}" required>
            </div>
            <div>
                <label for="nopolisi" class="form-label">No. Polisi</label>
                <input type="text" name="nopolisi" class="form-control" id="nopolisi" value="{{ $spansub->nopolisi }}" required>
            </div>
            <div>
                <label for="party" class="form-label">Party</label>
                <input type="text" name="party" class="form-control" id="party" value="{{ $spansub->party }}" required>
            </div>
            <div>
                <label for="nm_pengirim" class="form-label">Nama Pengirim Surat</label>
                <input type="text" name="nm_pengirim" class="form-control" id="nm_pengirim" value="{{ $spansub->nm_pengirim }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="/spansub" class="btn btn-dark">Back</a>
    </div>
</body>
</html>
