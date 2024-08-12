<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\Produk;
use App\Models\Form;
use App\Models\FakturPenjualan;

class FakturPenjualanController extends Controller
{
    public function index()
    {
        $invoice = FakturPenjualan::with('salesOrders', 'form')->get();
        return view('fakturpenjualan.index', compact('invoice'));
    }

    public function create($formId, $salesOrderId)
    {
        $form = Form::find($formId);
        $salesOrder = SalesOrder::find($salesOrderId);

        if (!$form || !$salesOrder) {
            return redirect()->route('salesorders.index')->withErrors('Form atau Sales Order tidak ditemukan.');
        }

        $produk = $salesOrder->produk;

        switch ($form->formdesign) {
            case 'Surat Permintaan Muat Alokasi Non Subsidi':
                return view('spmans.create', compact('form', 'salesOrder', 'produk'));
            case 'Faktur Penjualan':
                return view('fakturpenjualan.create', compact('form', 'salesOrder', 'produk'));
            default:
                return redirect()->route('salesorders.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_SO' => 'required|integer',
            'id_Form' => 'required|integer',
            'id_produk' => 'required|integer',
            'no_inv' => 'required|string',
            'tgl_inv' => 'required|date',
            'payment' => 'required|string',
            'namakios' => 'required|string',
            'pemilik' => 'required|string',
            'nofpb' => 'required|string',
            'catatan' => 'required|string',
            'namasales' => 'required|string',
        ]);

        $invoice = FakturPenjualan::create($request->all());

        return redirect()->route('form.preview2', [
            'formId' => $request->input('id_Form'), 
            'salesOrderId' => $request->input('id_SO'), 
            'invoiceId' => $invoice->id
        ]);
    }

    public function edit($id)
    {
        $invoice = FakturPenjualan::find($id);
        return view('fakturpenjualan.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_inv' => 'required|string',
            'tgl_inv' => 'required|date',
            'payment' => 'required|string',
            'namakios' => 'required|string',
            'pemilik' => 'required|string',
            'nofpb' => 'required|string',
            'catatan' => 'required|string',
            'namasales' => 'required|string',
        ]);

        $invoice = FakturPenjualan::find($id);
        if (!$invoice) {
            return redirect('/invoice');
        }

        $invoice->update($request->all());

        return redirect('/invoice');
    }

    public function destroy($id)
    {
        $invoice = FakturPenjualan::find($id);
        if ($invoice) {
            $invoice->delete();
        }
        return redirect('/invoice');
    }
}