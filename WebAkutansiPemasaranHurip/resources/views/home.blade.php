<!DOCTYPE html>
<html>
<head>
    <title>Penjualan dan Pemasaran PT. Hurip Utama</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #25430f;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo {
            margin-right: 20px;
            margin-left: 20px;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav a {
            color: #fff;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            background-color: #218838;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            flex: 1;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .card {
            background-color: #f8f9fa;
            border: 1px solid #28a745;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h2 {
            color: #000000;
            margin-top: 0;
        }

        .card p {
            color: #6c757d;
        }

        .card a {
            text-decoration: none;
            color: #fff;
            background-color: #28a745;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .card a:hover {
            background-color: #218838;
        }

        footer {
            background-color: #fbf650;
            color: #000000;
            text-align: center;
            padding: 0px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: center;
            }

            nav {
                flex-direction: column;
                align-items: center;
            }

            nav a {
                padding: 10px;
                width: 100%;
                text-align: center;
            }

            .cards {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('storage/images/logo.jpg') }}" alt="PT. Hurip Utama" class="logo" width="50">
        <nav>
            <a href="/company">COMPANY</a>
            <a href="/products">PRODUK</a>
            <a href="/customers">CUSTOMER</a>
            <a href="/forms">FORM</a>
        </nav>
    </header>
    <div class="container">
        <div class="cards">
            <div class="card">
                <h2>Sales Order</h2>
                <p>Manage your sales orders efficiently. Track, update, and review all your orders in one place.</p>
                <a href="{{ route('salesorders.index') }}">Go to Sales Order</a>
            </div>
            <div class="card">
                <h2>Delivery Order</h2>
                <p>Manage the delivery process of your sales orders. Track and update delivery status for efficient fulfillment.</p>
                <a href="{{ route('deliveryorder.index') }}">Go to Delivery Order</a>
            </div>
            <div class="card">
                <h2>Surat Pengantar Muat</h2>
                <p>This document accompanies goods during transportation. It details the contents of the shipment for verification.</p>
                <a href="{{ route('spmans.index') }}">Go to Surat Pengantar Muat</a>
            </div>
            <div class="card">
                <h2>Surat Pengantar Alokasi Industri</h2>
                <p>To informs recipients of their allocated goods. It specifies the quantity and type of products assigned to them.</p>
                <a href="{{ route('spaind.index') }}">Go to Surat Pengantar Alokasi</a>
            </div>
            <div class="card">
                <h2>Surat Pengantar Alokasi Non Subsidi</h2>
                <p>To informs recipients of their allocated goods. It specifies the quantity and type of products assigned to them.</p>
                <a href="{{ route('spansub.index') }}">Go to Surat Pengantar Alokasi</a>
            </div>
            <div class="card">
                <h2 style='margin-bottom: 40px;'>Faktur Penjualan</h2>
                <p style='margin-bottom: 20px;', >An official bill issued to customers for purchases. It details the products, quantities, and total amount due.</p>
                <a href="{{ route('invoice.index') }}">Go to Faktur Penjualan</a>
            </div>
        </div>
    </div>
    <footer>
        <p style='margin: 10px;'>
            <span style="font-weight: bold;">PT. Hurip Utama.</span>
            <br>&copy; 2024 All rights reserved. 
        </p>
    </footer>
</body>
</html>
