<!DOCTYPE html>
<html>
<head>
    <title>Edit Invoice</title>
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
        <h1>Edit Faktur Penjualan</h1>
        <form action="{{ route('invoice.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="no_inv" class="form-label">No. Invoice</label>
                <input type="text" name="no_inv" class="form-control" id="no_inv" value="{{ $invoice->no_inv }}" required>
            </div>
            <div>
                <label for="tgl_inv" class="form-label">Tanggal Invoice</label>
                <input type="date" name="tgl_inv" class="form-control" id="tgl_inv" value="{{ $invoice->tgl_inv }}" required>
            </div>
            <div>
                <label for="payment" class="form-label">Payment</label>
                <input type="text" name="payment" class="form-control" id="payment" value="{{ $invoice->payment }}" required>
            </div>
            <div>
                <label for="namakios" class="form-label">Party</label>
                <input type="text" name="namakios" class="form-control" id="namakios" value="{{ $invoice->namakios }}" required>
            </div>
            <div>
                <label for="pemilik" class="form-label">Pemilik</label>
                <input type="text" name="pemilik" class="form-control" id="pemilik" value="{{ $invoice->pemilik }}" required>
            </div>
            <div>
                <label for="nofpb" class="form-label">No. FPB</label>
                <input type="text" name="nofpb" class="form-control" id="nofpb" value="{{ $invoice->nofpb }}" required>
            </div>
            <div>
                <label for="catatan" class="form-label">Catatan</label>
                <textarea name="catatan" class="form-control" id="catatan" rows="4" required>{{ $invoice->catatan }}</textarea>
            </div>
            <div>
                <label for="namasales" class="form-label">Nama Sales</label>
                <input type="text" name="namasales" class="form-control" id="namasales" value="{{ $invoice->namasales }}" required>
            </div>
            

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="/invoice" class="btn btn-dark">Back</a>
    </div>
</body>
</html>
