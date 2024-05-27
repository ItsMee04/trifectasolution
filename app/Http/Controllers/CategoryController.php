<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category', ['category' => $category]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
        ];

        $credentials = $request->validate([
            'category'      => 'required',
            'description'   => 'required',
            'status'        => 'required',
        ], $messages);

        Category::create([
            'category'      => $request->category,
            'description'   => $request->description,
            'status'        => $request->status
        ]);

        return redirect('category')->with('success-message', 'Data Success Disimpan !');
    }
}
