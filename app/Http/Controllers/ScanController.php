<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    protected function index()
    {
        return view('admin.scan');
    }

    public function scanqr(Request $request)
    {
        $id = $request->qr_code;
        $qrcodeid = Product::where('codeproduct', $id)->first()->id;

        if ($id == $qrcodeid) {
            return response()->json([
                'status' => 200
            ]);

            return redirect('products/' . $qrcodeid)->with('success-message', 'Data Success Di Scan !');
        } else {
            return response()->json(
                [
                    'status' => 400
                ]
            );
            return redirect('products/' . $qrcodeid)->with('success-message', 'Data Failed Di Scan !');
        }
    }
}
