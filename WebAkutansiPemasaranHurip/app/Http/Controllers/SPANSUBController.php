<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SPANSUB;
use App\Models\DeliveryOrder;
use App\Models\Form;

class SPANSUBController extends Controller
{
    public function index()
    {
        $spansub = SPANSUB::with('salesOrders', 'form', 'deliveryOrders')->get();
        return view('spansub.index', compact('spansub'));
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

        $spansub = new SPANSUB();
        $spansub->id_SO = $request->id_SO;
        $spansub->id_Form = $request->formId;
        $spansub->id_DO = $request->deliveryOrderId;
        $spansub->no_inv = $request->no_inv;
        $spansub->tgl_inv = $request->tgl_inv;
        $spansub->nopolisi = $request->nopolisi;
        $spansub->party = $request->party;
        $spansub->nm_pengirim = $request->nm_pengirim;
        $spansub->save();

        return redirect()->route('form.previewdo', [
            'formId' => $request->formId, 
            'deliveryOrderId' => $request->deliveryOrderId, 
            'spaindId' => $spansub->id
        ]);
    }

    public function edit($id)
    {
        $spansub = SPANSUB::find($id);
        return view('spansub.edit', compact('spansub'));
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

        $spansub = SPANSUB::find($id);
        if (!$spansub) {
            return redirect('/spansub');
        }

        $spansub->update($request->all());

        return redirect('/spansub');
    }

    public function destroy($id)
    {
        $spansub = SPAIND::find($id);
        if ($spansub) {
            $spansub->delete();
        }
        return redirect('/spansub');
    }
    
}