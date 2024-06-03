<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
            'required'  => ':attribute wajib di isi !!!',
            'integer'   => ':attribute format wajib menggunakan angka',
            'regex'     => ':attribute format wajib menggnakan decimal',
            'numeric'   => ':attribute format wajib menggunakan angka',
            'mimes'     => ':attribute format wajib menggunakan PNG/JPG'
        ];

        $credentials = $request->validate([
            'codeproduct'   => 'required',
            'name'          => 'required',
            'sellingprice'  => 'required|integer',
            'type'          => 'required',
            'weight'        => 'required', 'numeric', 'min:1', 'max:99.99', 'regex:/^\d+(\.\d{1,2})?$/',
            'carat'         => 'required|integer',
            'category'      => 'required',
            'status'        => 'required',
            'image'         => 'mimes:png,jpg,jpeg',
        ], $messages);

        if ($request->type == 'Choose Status' || $request->category == 'Choose Status' || $request->status == 'Choose Status') {
            return redirect('products')->with('errors-message', 'Status wajib di isi !!!');
        }

        $newphoto = "";
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newphoto = $request->codeproduct . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('imageProduct', $newphoto);
            $request['image'] = $newphoto;
        }

        Product::create([
            'codeproduct'    => $request->codeproduct,
            'name'           => $request->name,
            'sellingprice'   => $request->sellingprice,
            'type_id'        => $request->type,
            'category_id'    => $request->category,
            'weight'         => $request->weight,
            'carat'          => $request->carat,
            'description'    => $request->description,
            'status'         => $request->status,
            'image'          => $newphoto
        ]);

        return redirect('products')->with('success-message', 'Data Success Disimpan !');
    }

    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        $image   = Product::where('id', $id)->first()->image;
        $size    = File::size('storage/imageProduct/' . $image) / 1024;
        return view('admin.product-details', ['product' => $product, 'size' => $size]);
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
        $listproduct = Product::where('id', $id)->first();

        $path = 'storage/imageProduct/' . $listproduct->photoproduct;

        if (File::exists($path)) {
            File::delete($path);
        }
        Product::where('id', $id)->delete();

        return redirect('product')->with('success-message', 'Data Success Di Hapus !');
    }
}
