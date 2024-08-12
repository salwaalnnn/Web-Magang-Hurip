<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SPAIND;
use App\Models\DeliveryOrder;
use App\Models\Form;
use App\Models\SalesOrder;

class SPAINDController extends Controller
{
    public function index()
    {
        $spaind = SPAIND::with('salesOrders', 'form', 'deliveryOrders')->get();
        return view('spaind.index', compact('spaind'));
    }

    public function create($formId, $deliveryOrderId)
    {
        $form = Form::find($formId);
        $deliveryOrder = DeliveryOrder::find($deliveryOrderId);

        if (!$form || !$deliveryOrder) {
            return redirect()->route('deliveryorder.index');
        }

        $salesOrder = $deliveryOrder->salesOrder;
        $customer = $salesOrder->customer;
        $product = $salesOrder->produk;

        switch ($form->formdesign) {
            case 'Surat Pengantar Alokasi Industri':
                return view('spaind.create', compact('form', 'deliveryOrder', 'salesOrder', 'customer', 'product'));
            case 'Surat Pengantar Alokasi Non Subsidi':
                return view('spansub.create', compact('form', 'deliveryOrder', 'salesOrder', 'customer', 'product'));
            default:
                return redirect()->route('deliveryorder.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'formId' => 'required|exists:form,id',
            'deliveryOrderId' => 'required|exists:deliveryorder,id',
            'id_SO' => 'required|exists:salesorder,id',
            'no_inv' => 'required|string|max:255',
            'tgl_inv' => 'required|date',
            'nopolisi' => 'required|string|max:255',
            'party' => 'required|string|max:255',
            'nm_pengirim' => 'required|string|max:255',
        ]);

        $spaind = new SPAIND();
        $spaind->id_SO = $request->id_SO;
        $spaind->id_Form = $request->formId;
        $spaind->id_DO = $request->deliveryOrderId;
        $spaind->no_inv = $request->no_inv;
        $spaind->tgl_inv = $request->tgl_inv;
        $spaind->nopolisi = $request->nopolisi;
        $spaind->party = $request->party;
        $spaind->nm_pengirim = $request->nm_pengirim;
        $spaind->save();

        return redirect()->route('form.previewdo', [
            'formId' => $request->formId, 
            'deliveryOrderId' => $request->deliveryOrderId, 
            'spaindId' => $spaind->id
        ]);
    }

    public function edit($id)
    {
        $spaind = SPAIND::find($id);
        return view('spaind.edit', compact('spaind'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_inv' => 'required|string',
            'tgl_inv' => 'required|date',
            'nopolisi' => 'required|string',
            'party' => 'required|string',
            'nm_pengirim' => 'required|string',
        ]);

        $spaind = SPAIND::find($id);
        if (!$spaind) {
            return redirect('/spaind');
        }

        $spaind->update($request->all());

        return redirect('/spaind');
    }

    public function destroy($id)
    {
        $spaind = SPAIND::find($id);
        if ($spaind) {
            $spaind->delete();
        }
        return redirect('/spaind');
    }
}
