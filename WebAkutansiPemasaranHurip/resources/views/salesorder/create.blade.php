<!DOCTYPE html>
<html>
<head>
    <title>Tambah Sales Order</title>
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

        .btn-success {
            background-color: #28a745;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Sales Order</h1>
        <form action="{{ route('salesorders.store') }}" method="POST">
            @csrf
            <div>
                <label for="No_SO" class="form-label">No. SO</label>
                <input type="text" name=" No_SO" class="form-control" id="No_SO" required>
            </div>
            <div>
                <label for="tglSO" class="form-label">Tanggal SO</label>
                <input type="date" name="tglSO" class="form-control" id="tglSO" required>
            </div>
            <div>
                <label for="id_Customer" class="form-label">Perusahaan</label>
                <select name="id_Customer" id="id_Customer" class="form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->namaperusahaan }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="id_Produk" class="form-label">Barang</label>
                <select name="id_Produk" id="id_Produk" class="form-control" required>
                    @foreach($produk as $p)
                        <option value="{{ $p->id }}" data-harga="{{ $p->harga }}">{{ $p->namaproduk }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tonase" class="form-label">Tonase </label>
                <input type="number" name="tonase" class="form-control" id="tonase" required>
            </div>
            <div>
                <label for="satuan" class="form-label">Satuan</label>
                <select name="satuan" id="satuan" class="form-control">
                    <option value="Kg">Kg</option>
                    <option value="Ton">Ton</option>
                </select>
            </div>
            <div>
                <label for="diskon" class="form-label">Diskon (%)</label>
                <input type="number" name="diskon" class="form-control" id="diskon" required>
            </div>
            <div>
                <label for="pajak" class="form-label">Pajak (%)</label>
                <input type="number" name="pajak" class="form-control" id="pajak" required>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Save">
        </form>
    </div>
</body>
</html>