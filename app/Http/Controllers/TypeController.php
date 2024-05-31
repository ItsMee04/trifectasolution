<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $type = Type::all();
        return view('admin.type', ['type' => $type]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'type'          => 'required',
            'status'        => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('type')->with('errors-message', 'Status wajib di isi !!!');
        }

        Type::create([
            'type'  => $request->type,
            'status' => $request->status
        ]);

        return redirect('type')->with('success-message', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'type'          => 'required',
            'status'        => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('type')->with('errors-message', 'Status wajib di isi !!!');
        }

        Type::where('id', $id)
            ->update([
                'type'  => $request->type,
                'status' => $request->status
            ]);

        return redirect('type')->with('success-message', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        Type::where('id', $id)
            ->delete();

        return redirect('type')->with('success-message', 'Data Success Dihapus !');
    }
}
