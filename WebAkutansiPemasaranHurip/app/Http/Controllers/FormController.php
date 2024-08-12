<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\SalesOrder;
use App\Models\SPMANS;
use App\Models\FakturPenjualan;
use App\Models\SPAIND;
use App\Models\SPANSUB;
use App\Models\DeliveryOrder;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('form.index', compact('forms'));
    }

    public function create()
    {
        return view('form.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'formdesign' => 'required|string|max:255',
            'jenisform' => 'required|string|in:SO,DO',
        ]);

        Form::create($request->all());

        return redirect('/forms');
    }

    public function edit($id)
    {
        $form = Form::find($id);

        switch ($form->formdesign) { 
            case 'Surat Permintaan Muat Alokasi Non Subsidi':
                return view('form.editspmans', compact('form'));
            case 'Surat Pengantar Alokasi Industri': 
                return view('form.editspaind', compact('form'));
            case 'Surat Pengantar Alokasi Non Subsidi':
                return view('form.editspansub', compact('form'));
            case 'Faktur Penjualan':
                return view('form.editfaktur', compact('form'));
            default:
                return redirect()->route('forms.index')->withErrors('Unknown form type.');
        }
    }

    public function previewso($formId, $salesOrderId, $suratId)
    {
        $form = Form::find($formId);
        $salesOrder = SalesOrder::with('produk', 'customer')->find($salesOrderId);

        if (!$form || !$salesOrder) {
            return redirect()->route('salesorders.index');
        }

        switch ($form->formdesign) {
            case 'Surat Permintaan Muat Alokasi Non Subsidi':
                $surat = SPMANS::find($suratId);
                if (!$surat) {
                    return redirect()->route('spmans.create', [$formId, $salesOrderId]);
                }

                return view('form.spmans', compact('form', 'salesOrder', 'surat'));
            case 'Faktur Penjualan':
                $invoice = FakturPenjualan::find($suratId);
                if (!$invoice) {
                    return redirect()->route('invoice.create', [$formId, $salesOrderId]);
                }
                return view('form.fakturjual', compact('form', 'salesOrder', 'invoice'));            
            default:
                return redirect()->route('salesorders.index')->withErrors('Unknown form type.');
        }
    }

    public function previewdo($formId, $deliveryOrderId, $spaindId)
    {
        $form = Form::find($formId);
        if (!$form) {
            return redirect()->route('deliveryorder.index')->withErrors('Form not found.');
        }

        $deliveryOrder = DeliveryOrder::find($deliveryOrderId);
        if (!$deliveryOrder) {
            return redirect()->route('deliveryorder.index')->withErrors('Delivery Order not found.');
        }

        $salesOrder = SalesOrder::find($deliveryOrder->id_SalesOrder);
        if (!$salesOrder) {
            return redirect()->route('salesorders.index')->withErrors('Sales Order not found.');
        }

        switch ($form->formdesign) {
            case 'Surat Pengantar Alokasi Industri':
                $spaind = SPAIND::find($spaindId);
                if (!$spaind) {
                    return redirect()->route('spaind.create', [$formId, $deliveryOrderId]);
                }
                return view('form.spaind', compact('form', 'salesOrder', 'spaind', 'deliveryOrder'));
            case 'Surat Pengantar Alokasi Non Subsidi':
                $spansub = SPANSUB::find($spaindId);
                if (!$spansub) {
                    return redirect()->route('spansub.create', [$formId, $deliveryOrderId]);
                }
                return view('form.spansub', compact('form', 'salesOrder', 'spansub', 'deliveryOrder'));

            default:
                return redirect()->route('deliveryorder.index')->withErrors('Unknown form type.');
        }
    }

    public function destroy($id)
    {
        $forms = Form::find($id);
        if ($forms) {
            $forms->delete();
        }
        return redirect('/forms');
    }
}
