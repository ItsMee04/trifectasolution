<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::where('status', 1)->get();
        $type = Type::all();
        $category   = Category::where('status', 1)->get();

        //codeproduct
        $numberproduct = Product::latest()->first();
        $code = "P-";
        $year = date('Y');

        if ($numberproduct == null) {
            $serialnumber = "000001";
            $codeproduct = $code . $year . $serialnumber;
        } else {
            $serialnumber = substr($numberproduct->codeproduct, 6, 6) + 1;
            $serialnumber = str_pad($serialnumber, 6, "0", STR_PAD_LEFT);

            $codeproduct = $code . $year . $serialnumber;
        }
        return view('admin.product', ['product' => $product, 'type' => $type, 'codeproduct' => $codeproduct, 'category' => $category]);
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'integer'  => ':attribute format wajib menggunakan angka',
            'mimes'    => ':attribute format wajib menggunakan PNG/JPG'
        ];

        $credentials = $request->validate([
            'codeproduct'   => 'required',
            'name'          => 'required',
            'sellingprice'  => 'required|integer',
            'type'          => 'required',
            'weight'        => 'required|integer',
            'category'      => 'required',
            'status'        => 'required',
            'image'         => 'mimes:png,jpg,jpeg',
        ], $messages);

        if ($request->status == 'Choose Status') {
            return redirect('category')->with('errors-message', 'Status wajib di isi !!!');
        }

        $Image = "";
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newphoto = $request->codeproduct . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('ImageProduct', $Image);
            $request['image'] = $Image;
        }

        Product::create([
            'codeproduct'           => $request->codeproduct,
            'nameproduct'           => $request->nameproduct,
            'descriptionproduct'    => $request->descriptionproduct,
            'sellingprice'          => $request->sellingprice,
            'typeproduct'           => $request->typeproduct,
            'weightproduct'         => $request->weightproduct,
            'caratproduct'          => $request->caratproduct,
            'status'                => $request->status,
            'photoproduct'          => $newphoto
        ]);

        return redirect('product')->with('success', 'Data Success Disimpan !');
    }
}
