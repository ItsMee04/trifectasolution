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
}
