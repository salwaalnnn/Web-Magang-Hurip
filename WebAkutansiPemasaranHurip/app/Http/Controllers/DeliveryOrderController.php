<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Models\SalesOrder;
use App\Models\Form;

class DeliveryOrderController extends Controller
{
    public function index()
    {
        $deliveryorder = DeliveryOrder::with(['salesorder'])->get();
        $form = Form::where('jenisform', 'DO')->get();
        return view('deliveryorder.index', compact('deliveryorder', 'form'));
    }

    public function create()
    {
        $salesorder = SalesOrder::all();
        return view('deliveryorder.create', compact('salesorder'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_DO' => 'required|string',
            'tgl_DO' => 'required|date',
            'id_SalesOrder' => 'required|integer',
        ]);

        DeliveryOrder::create([
            'no_DO' => $request->no_DO,
            'tgl_DO' => $request->tgl_DO,
            'id_SalesOrder' => $request->id_SalesOrder,
        ]);

        return redirect()->route('deliveryorder.index');
    }

    public function destroy($id)
    {
        $deliveryorder = DeliveryOrder::find($id);
        if (!$deliveryorder) {
            return redirect('/deliveryorder');
        }
        
        $deliveryorder->delete();

        return redirect('/deliveryorder');
    }
}
