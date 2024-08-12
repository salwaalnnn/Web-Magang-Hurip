<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $products = Produk::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaproduk' => 'required|string|max:255',
            'qtyunit' => 'required|numeric',
            'qtysatuan' => 'required|string|in:Kg,Ton',
            'hargaunit' => 'required|numeric|min:0',
            'jenisproduk' => 'required|string|in:Industri,Nonsubsidi',
        ]);

        Produk::create([
            'namaproduk' => $request->namaproduk,
            'qtyunit' => $request->qtyunit,
            'qtysatuan' => $request->qtysatuan,
            'hargaunit' => $request->hargaunit,
            'jenisproduk' => $request->jenisproduk,
        ]);

        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Produk::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namaproduk' => 'required|string|max:255',
            'qtyunit' => 'required|numeric',
            'qtysatuan' => 'required|string|in:Kg,Ton',
            'hargaunit' => 'required|numeric',
            'jenisproduk' => 'required|string|in:Industri,Nonsubsidi',
        ]);

        $product = Produk::find($id);
        if (!$product) {
            return redirect('/products');
        }
        $product->update($request->all());

        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Produk::find($id);
        if ($product) {
            $product->delete();
        }

        return redirect('/products');
    }
}