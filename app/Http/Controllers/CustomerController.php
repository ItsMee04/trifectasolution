<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        return view('admin.customer', ['customer' => $customer]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'integer'  => ':attribute wajib di isi dengan Angka !!!',
        ];

        $credentials = $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'identity'  => 'required|integer',
            'phone'     => 'required|integer',
            'birthday'  => 'required',
            'status'    => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('customer')->with('errors-message', 'Status wajib di isi !!!');
        }

        Customer::create([
            'name'      =>  $request->name,
            'address'   =>  $request->address,
            'identity'  =>  $request->identity,
            'birthday'  =>  $request->birthday,
            'phone'     =>  $request->phone,
            'status'    =>  $request->status,
        ]);

        return redirect('customer')->with('success-message', 'Data Success Di Simpan !');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'integer'  => ':attribute wajib di isi dengan Angka !!!',
        ];

        $credentials = $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'identity'  => 'required|integer',
            'phone'     => 'required|',
            'birthday'  => 'required',
            'status'    => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('customer')->with('errors-message', 'Status wajib di isi !!!');
        }

        Customer::where('id', $id)->update([
            'name'      =>  $request->name,
            'address'   =>  $request->address,
            'identity'  =>  $request->identity,
            'birthday'  =>  $request->birthday,
            'phone'     =>  $request->phone,
            'status'    =>  $request->status,
        ]);

        return redirect('customer')->with('success-message', 'Data Success Di Simpan !');
    }

    public function delete($id)
    {
        Customer::where('id', $id)->delete();

        return redirect('customer')->with('success-message', 'Data Succes Di Hapus !');
    }
}
