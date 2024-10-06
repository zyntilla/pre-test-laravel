<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::latest()->get();
        return view('customer.index', compact('customer'));
    }

    public function create()
    {
        return view('Customer.create');
    }

    public function store(Request $request)
    {
        Customer::create([
            'name' => $request->get('name')
        ]);
        return redirect()->back()->with('message', 'Customer berhasil di buat');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
?>