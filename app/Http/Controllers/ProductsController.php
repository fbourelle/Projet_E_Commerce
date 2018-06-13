<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Variant;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
      // $products = Product::with('category')
      //               // ->join(Variant::where('products.id', 'variants.product_id'))
      //               // ->join('variants', 'products.id', '=', 'variants.product_id')
      //               ->with('variants')
      //               ->with('colors')
      //               ->with('sizes')
      //               ->get();

      $products = DB::table('products')
                      ->select('variants.id as id', 'designation', 'price', 'categories.name as category', 'colors.name as color', 'sizes.name as size', 'variants.stock as stock', 'variants.online as online')
                      ->join('variants', 'products.id', '=', 'variants.product_id')
                      ->join('colors', 'variants.color_id', '=', 'colors.id')
                      ->join('sizes', 'variants.size_id', '=', 'sizes.id')
                      ->join('categories', 'products.category_id', '=', 'categories.id')
                      ->orderBy('products.id')
                      ->orderBy('colors.id')
                      ->get();

      // dd($products);
      return view('admin.index', compact('products'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit($id)
    {
      $variant = Variant::findOrFail($id);
      $product = Product::where('id', $variant->product_id)->firstOrFail();
      dd($variant);

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
