<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
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
        <h1>Tambah Produk</h1>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div>
                <label for="namaproduk" class="form-label">Nama Produk</label>
                <input type="text" name="namaproduk" class="form-control" id="namaproduk" required>
            </div>
            <div>
                <label for="qtyunit" class="form-label">Quantity isi per Unit</label>
                <input type="number" name="qtyunit" class="form-control" id="qtyunit" required>
            </div>
            <div>
                <label for="qtysatuan" class="form-label">Quantity Satuan</label>
                <select name="qtysatuan" id="qtysatuan" class="form-control">
                    <option value="Kg">Kg</option>
                    <option value="Ton">Ton</option>
                </select>
            </div>
            <div>
                <label for="hargaunit" class="form-label">Harga Unit</label>
                <input type="number" name="hargaunit" class="form-control" id="hargaunit" required>
            </div>
            <div>
                <label for="jenisproduk" class="form-label">Jenis Produk</label>
                <select name="jenisproduk" id="jenisproduk" class="form-control">
                    <option value="Industri">Industri</option>
                    <option value="Nonsubsidi">Nonsubsidi</option>
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Save">
        </form>
    </div>
    <a href="/products" class="btn btn-dark">Back</a>
</body>
</html>