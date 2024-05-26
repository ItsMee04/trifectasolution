<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProfessionController extends Controller
{
    public function index()
    {
        $listprofession = Profession::all();
        return view('admin.profession', ['listprofession' => $listprofession]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'profession'    => 'required',
            'status'        => 'required',
        ], $messages);

        Profession::create([
            'profession'    => $request->profession,
            'status'        => $request->status
        ]);

        return redirect('profession')->with('success-message', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'profession'          => 'required',
            'status'        => 'required',
        ], $messages);

        Profession::where('id', $id)
            ->update([
                'profession'   => $request->profession,
                'status'       => $request->status
            ]);

        return redirect('profession')->with('success-message', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        Profession::where('id', $id)
            ->delete();

        return redirect('profession')->with('success-message', 'Data Success Diahpus !');
    }
}
