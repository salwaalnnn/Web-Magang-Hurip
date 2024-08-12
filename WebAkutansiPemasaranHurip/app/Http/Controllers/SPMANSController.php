<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SPMANS;
use App\Models\SalesOrder;
use App\Models\Form;

class SPMANSController extends Controller
{
    public function index()
    {
        $spmans = SPMANS::with('salesOrders', 'form')->get();
        return view('spmans.index', compact('spmans'));
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
                return redirect()->route('salesorders.index')->withErrors('Form tidak dikenal.');
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
            'nm_kepalagudang' => 'required|string',
            'nopolisi' => 'required|string',
            'nm_pengemudi' => 'required|string',
            'nm_pengirimsurat' => 'required|string',
        ]);

        $spmans = SPMANS::create($request->all());

        return redirect()->route('form.preview', [
            'formId' => $request->input('id_Form'), 
            'salesOrderId' => $request->input('id_SO'), 
            'spmansId' => SPMANS::latest()->first()->id
        ]);
    }

    public function edit($id)
    {
        $spmans = SPMANS::find($id);
        return view('spmans.edit', compact('spmans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_inv' => 'required|string',
            'tgl_inv' => 'required|date',
            'nm_kepalagudang' => 'required|string',
            'nopolisi' => 'required|string',
            'nm_pengemudi' => 'required|string',
            'nm_pengirimsurat' => 'required|string',
        ]);

        $spmans = SPMANS::find($id);
        if (!$spmans) {
            return redirect('/spmans');
        }

        $spmans->update($request->all());

        return redirect('/spmans');
    }

    public function destroy($id)
    {
        $spmans = SPMANS::find($id);
        if ($spmans) {
            $spmans->delete();
        }
        return redirect('/spmans');
    }
}
