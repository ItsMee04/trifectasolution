<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'mimes'    => ':attribute format wajib menggunakan PNG/JPG'
        ];

        $credentials = $request->validate([
            'type'          => 'required',
            'icon'          => 'mimes:png,jpg,jpeg',
            'status'        => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('type')->with('errors-message', 'Status wajib di isi !!!');
        }

        $icon = "";
        if ($request->file('icon')) {
            $extension = $request->file('icon')->getClientOriginalExtension();
            $icon = $request->type . '-' . now()->timestamp . '.' . $extension;
            $request->file('icon')->storeAs('Icon', $icon);
            $request['icon'] = $icon;
        }

        Type::create([
            'type'  => $request->type,
            'icon'  => $icon,
            'status' => $request->status
        ]);

        return redirect('type')->with('success-message', 'Data Success Disimpan !');
    }

    public function update(Request $request, $id)
    {
        $type = Type::where('id', $id)->first();
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'mimes'    => ':attribute format wajib menggunakan PNG/JPG'
        ];

        $credentials = $request->validate([
            'type'          => 'required',
            'icon'          => 'mimes:png,jpg,jpeg',
            'status'        => 'required',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('type')->with('errors-message', 'Status wajib di isi !!!');
        }

        if ($request->file('icon')) {

            $path = 'storage/Icon/' . $type->icon;

            if (File::exists($path)) {
                File::delete($path);
            }

            $extension = $request->file('icon')->getClientOriginalExtension();
            $newphoto = $request->type . '-' . now()->timestamp . '.' . $extension;
            $request->file('icon')->storeAs('Icon', $newphoto);
            $request['icon'] = $newphoto;

            Type::where('id', $id)
                ->update([
                    'type'  => $request->type,
                    'icon'  => $newphoto,
                    'status' => $request->status
                ]);
        } else {
            Type::where('id', $id)
                ->update([
                    'type'  => $request->type,
                    'status' => $request->status
                ]);
        }

        return redirect('type')->with('success-message', 'Data Success Diupdate !');
    }

    public function delete($id)
    {
        $type = Type::where('id', $id)->first();
        $path = 'storage/Icon/' . $type->icon;

        if (File::exists($path)) {
            File::delete($path);
        }

        Type::where('id', $id)->delete();

        return redirect('type')->with('success-message', 'Data Success Dihapus !');
    }
}
