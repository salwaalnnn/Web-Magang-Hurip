<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaperusahaan' => 'required|string|max:255',
            'namacustomer' => 'required|string|max:255',
            'notelp' => 'required|string',
            'email' => 'required|email|unique:customer,email',
            'kota' => 'required|string',
            'alamat' => 'required|string',
            'alamat_gudang' => 'required|string',
        ]);

        Customer::create($request->all());

        return redirect('/customers');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'namaperusahaan' => 'required|string|max:255',
            'namacustomer' => 'required|string|max:255',
            'notelp' => 'required|string',
            'email' => 'required|email|unique:customer,email,'. $id,
            'kota' => 'required|string',
            'alamat' => 'required|string',
            'alamat_gudang' => 'required|string',
        ]);

        $customer = Customer::find($id);
        if (!$customer) {
            return redirect('/customers');
        }

        $customer->update($request->all());

        return redirect('/customers');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            return redirect('/customers');
        }
        $customer->delete();

        return redirect('/customers');
    }
}