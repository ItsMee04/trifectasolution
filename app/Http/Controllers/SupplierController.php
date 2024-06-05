<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier', ['supplier' => $supplier]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'numeric' => ':attribute wajib di isi dengan angka !!!',
        ];

        $credentials = $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'phone'     => 'required|numeric',
            'status'    => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('supplier')->with('errors-message', 'Status wajib di isi !!!');
        }

        Supplier::create([
            'name'      =>  $request->name,
            'address'   =>  $request->address,
            'phone'     =>  $request->phone,
            'status'    =>  $request->status
        ]);

        return redirect('supplier')->with('success-message', 'Data Success Di Simpan');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'numeric' => ':attribute wajib di isi dengan angka !!!',
        ];

        $credentials = $request->validate([
            'name'      => 'required',
            'address'   => 'required',
            'phone'     => 'required|numeric',
            'status'    => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('supplier')->with('errors-message', 'Status wajib di isi !!!');
        }

        Supplier::where('id', $id)->update([
            'name'      =>  $request->name,
            'address'   =>  $request->address,
            'phone'     =>  $request->phone,
            'status'    =>  $request->status
        ]);

        return redirect('supplier')->with('success-message', 'Data Success Di Simpan');
    }

    public function delete($id)
    {
        Supplier::where('id', $id)->delete();

        return redirect('supplier')->with('success-message', 'Data Success Di Hapus !');
    }
}
