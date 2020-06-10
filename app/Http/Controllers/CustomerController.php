<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data_customer = \App\Customer::all();
        return view('customer.index', ['data_customer' => $data_customer]);
    }

    public function create(Request $request)
    {
        \App\Customer::create($request->all());
        return redirect('/customer')->with('sukses', 'Data berhasil di input');
    }
    public function edit($id)
    {
        $customer = \App\Customer::find($id);
        return view('customer/edit', ['customer' => $customer]);
    }
    public function update(Request $request, $id)
    {
        $customer = \App\Customer::find($id);
        $customer->update($request->all());
        return redirect('/customer')->with('sukses', 'Data berhasil di ubah');
    }
    public function delete($id)
    {
        $customer = \App\Customer::find($id);
        $customer->delete($customer);
        return redirect('/customer')->with('sukses', 'Data berhasil di hapus');
    }
}
