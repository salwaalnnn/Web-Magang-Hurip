<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #28a745;
            color: white;
            text-align: center;
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
            background-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-danger {
            background-color: #dc3545;
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
        <h1>Form Design List</h1>
        <a class="btn btn-primary" href="{{ route('forms.create') }}">Add Form</a>
        <table class="table table-hover">
            <tr>
                <th>No</th>
                <th>Form Design</th>
                <th>Process</th>
            </tr>
            @foreach($forms as $f)
            <tr>
                <td>{{ $f->id }}</td>
                <td>{{ $f->formdesign }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('forms.edit', $f->id) }}">Preview</a>
                    <form action="{{ route('forms.destroy', $f->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="&#128465">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <a href="/" class="btn btn-dark">Back</a>
</body>
</html>
