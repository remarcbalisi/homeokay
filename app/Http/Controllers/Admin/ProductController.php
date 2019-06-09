<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function create() {
        return view('admin.product.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:products'
        ]);
        $tags = json_decode($request->tags);
        foreach( $tags as $tag ) {
            $check_tag = Tag::where('value', $tag->value)->first();
            if( empty($check_tag) ) {
                $new_tag = new Tag;
                $new_tag->value = $tag->value;
                $new_tag->label = $tag->label;
                $new_tag->save();
            }
        }

        $new_product = new Product;
        $new_product->name = $request->name;
        $new_product->description = $request->description;
        $new_product->slug = strtolower(str_replace(" ", "-", $request->name));
        $new_product->tags = $request->tags;
        $new_product->save();

        return redirect()->back()->with([
            'success' => 'Successfully added ' . $new_product->name,
        ]);
    }

    public function list() {
        $products = Product::get();
        return view('admin.product.list')->with([
            'products' => $products,
        ]);
    }

    public function view($product_slug) {
        return view('admin.product.view')->with([
            'product' => Product::where('slug', $product_slug)->first(),
        ]);
    }
}
