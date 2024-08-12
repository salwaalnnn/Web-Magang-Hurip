<!DOCTYPE html>
<html>
<head>
    <title>Create SPMANS</title>
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
        <h1>Create Surat Pengantar Muat Alokasi Non Subsidi</h1>
        <form action="{{ route('spmans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_SO" value="{{ $salesOrder->id }}">
            <input type="hidden" name="id_Form" value="{{ $form->id }}">
            <input type="hidden" name="id_produk" value="{{ $produk->id }}">
            <div>
                <label for="no_inv" class="form-label">No. Invoice</label>
                <input type="text" name="no_inv" class="form-control" id="no_inv" required>
            </div>
            <div>
                <label for="tgl_inv" class="form-label">Tanggal Invoice</label>
                <input type="date" name="tgl_inv" class="form-control" id="tgl_inv" required>
            </div>
            <div>
                <label for="nm_kepalagudang" class="form-label">Nama Kepala Gudang</label>
                <input type="text" name="nm_kepalagudang" class="form-control" id="nm_kepalagudang" required>
            </div>
            <div>
                <label for="nopolisi" class="form-label">No. Polisi</label>
                <input type="text" name="nopolisi" class="form-control" id="nopolisi" required>
            </div>
            <div>
                <label for="nm_pengemudi" class="form-label">Nama Pengemudi</label>
                <input type="text" name="nm_pengemudi" class="form-control" id="nm_pengemudi" required>
            </div>
            <div>
                <label for="nm_pengirimsurat" class="form-label">Nama Pengirim Surat</label>
                <input type="text" name="nm_pengirimsurat" class="form-control" id="nm_pengirimsurat" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="/salesorders" class="btn btn-dark">Back</a>
    </div>
</body>
</html>
