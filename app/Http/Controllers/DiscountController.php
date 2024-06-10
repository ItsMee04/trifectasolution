<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discount = Discount::all();
        return view('admin.discount', ['discount' => $discount]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'name'          => 'required',
            'value'         => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('role')->with('errors-message', 'Status wajib di isi !!!');
        }

        Discount::create([
            'name'      =>  $request->name,
            'value'     =>  $request->value,
            'status'    =>  $request->status
        ]);

        return redirect('discount')->with('success-message', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'name'          => 'required',
            'value'         => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('role')->with('errors-message', 'Status wajib di isi !!!');
        }

        Discount::where('id', $id)
            ->update([
                'name'      =>  $request->name,
                'value'     =>  $request->value,
                'status'    =>  $request->status
            ]);

        return redirect('discount')->with('success-message', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        Discount::where('id', $id)->delete();

        return redirect('discount')->with('success-message', 'Data Success Di Hapus !');
    }
}
