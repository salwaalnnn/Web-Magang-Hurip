<!DOCTYPE html>
<html>
<head>
    <title>Delivery Order</title>
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
        <h1>Tambah DO</h1>
        <form action="{{ route('deliveryorder.store') }}" method="POST">
            @csrf
            <div>
                <label for="no_DO" class="form-label">No. DO</label>
                <input type="text" name="no_DO" class="form-control" id="no_DO" required>
            </div>
            <div>
                <label for="tgl_DO" class="form-label">Tanggal DO</label>
                <input type="date" name="tgl_DO" class="form-control" id="tgl_DO" required>
            </div>
            <div>
                <label for="id_SalesOrder" class="form-label">No. SO</label>
                <select name="id_SalesOrder" id="id_SalesOrder" class="form-control" required>
                    @foreach($salesorder as $so)
                        <option value="{{ $so->id }}">{{ $so->No_SO }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Save">
        </form>
    </div>
</body>
</html>
