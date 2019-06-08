<?php

namespace App\Http\Controllers\API\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function list(Request $request) {
        $products = Product::get();
        return response()->json([
           'data' => $products,
            'status' => 200
        ]);
    }
}
