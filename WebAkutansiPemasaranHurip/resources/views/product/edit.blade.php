<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
    <style>
        body {
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
            width: 5%;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Produk</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="namaproduk" class="form-label">Nama Produk</label>
                <input type="text" name="namaproduk" class="form-control" id="namaproduk" value="{{ $product->namaproduk }}" required>
            </div>
            <div class="form-group">
                <label for="qtyunit" class="form-label">Quantity isi per Unit</label>
                <input type="number" name="qtyunit" class="form-control" id="qtyunit" value="{{ $product->qtyunit }}" required>
            </div>
            <div class="form-group">
                <label for="qtysatuan" class="form-label">Quantity Satuan</label>
                <select name="qtysatuan" id="qtysatuan" class="form-control">
                    <option value="Kg" {{ $product->qtysatuan == 'Kg' ? 'selected' : '' }}>Kg</option>
                    <option value="Ton" {{ $product->qtysatuan == 'Ton' ? 'selected' : '' }}>Ton</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hargaunit" class="form-label">Harga Unit</label>
                <input type="number" name="hargaunit" class="form-control" id="hargaunit" value="{{ $product->hargaunit }}" required>
            </div>
            <div class="form-group">
                <label for="jenisproduk" class="form-label">Jenis Produk</label>
                <select name="jenisproduk" id="jenisproduk" class="form-control">
                    <option value="Industri" {{ $product->jenisproduk == 'Industri' ? 'selected' : '' }}>Industri</option>
                    <option value="Nonsubsidi" {{ $product->jenisproduk == 'Nonsubsidi' ? 'selected' : '' }}>Nonsubsidi</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Update">
        </form>
    </div>
    <a href="/products" class="btn btn-dark back-button">Back</a>
</body>
</html>