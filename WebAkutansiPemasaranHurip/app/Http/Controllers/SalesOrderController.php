<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\Form;

class SalesOrderController extends Controller
{
    public function index()
    {
        $salesorders = SalesOrder::with(['produk', 'customer'])->get();
        $form = Form::where('jenisform', 'SO')->get();
        return view('salesorder.index', compact('salesorders', 'form'));
    }

    public function create()
    {
        $produk = Produk::all();
        $customers = Customer::all();
        return view('salesorder.create', compact('produk', 'customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_SO' => 'required|string',
            'tglSO' => 'required|date',
            'id_Produk' => 'required|integer',
            'id_Customer' => 'required|integer',
            'tonase' => 'required|numeric',
            'satuan' => 'required|string|in:Kg,Ton',
            'diskon' => 'required|numeric|min:0|max:100',
            'pajak' => 'required|numeric|min:0|max:100',
        ]);

        $produk = Produk::find($request->id_Produk);

        $ton = 0;
        $kg = 0;
        $zak = 0;

        if ($request->satuan == 'Ton') {
            $ton = $request->tonase;
            $kg = $request->tonase * 1000;
            $zak = $kg / 50;
            $jumlah = ( $ton / $produk->qtyunit) * $produk->hargaunit;

            $discountAmount = $jumlah * ($request->diskon / 100);
            $taxAmount = $jumlah * ($request->pajak / 100);
            $total = ($jumlah - $discountAmount) + $taxAmount;

        } elseif ($request->satuan == 'Kg') {
            $kg = $request->tonase;
            $ton = $request->tonase / 1000;
            $zak = $kg / 50;
            $jumlah = ($kg / $produk->qtyunit) * $produk->hargaunit;

            $discountAmount = $jumlah * ($request->diskon / 100);
            $taxAmount = $jumlah * ($request->pajak / 100);
            $total = ($jumlah - $discountAmount) + $taxAmount;
        }


        SalesOrder::create([
            'No_SO' => $request->No_SO,
            'tglSO' => $request->tglSO,
            'id_Produk' => $request->id_Produk,
            'id_Customer' => $request->id_Customer,
            'tonase' => $request->tonase,
            'satuan' => $request->satuan,
            'diskon' => $request->diskon,
            'pajak' => $request->pajak,
            'ton' => $ton,
            'kg' => $kg,
            'zak' => $zak,
            'jumlah' => $jumlah,
            'total' => $total,
        ]);

        return redirect()->route('salesorders.index');
    }

    public function destroy($id)
    {
        $salesorders = SalesOrder::find($id);
        if (!$salesorders) {
            return redirect('/salesorders');
        }
        $salesorders->delete();

        return redirect('/salesorders');
    }
}