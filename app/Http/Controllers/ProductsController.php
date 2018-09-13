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

      $productTags = DB::table('post_tag')
                   ->select('post_tag.post_id')
                   ->join('tags' , 'post_tag.tag_id', '=', 'tags.id');

      $products = DB::table('products')
                      ->select('variants.id as id', 'designation', 'price', 'categories.name as category', 'colors.name as color', 'sizes.name as size', 'variants.stock as stock', 'variants.online as online', 'tags.name as tags')
                      ->join('variants', 'products.id', '=', 'variants.product_id')
                      ->join('colors', 'variants.color_id', '=', 'colors.id')
                      ->join('sizes', 'variants.size_id', '=', 'sizes.id')
                      // ->joinSub($productTags, 'product_tag', function($join) {
                      //     $join->on('product_tag.post_tag.post_id', '=', 'products.id');
                      // })
                      ->join('post_tag', 'post_tag.post_id', '=', 'products.id')
                      ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
                      ->join('categories', 'products.category_id', '=', 'categories.id')
                      ->orderBy('products.id')
                      ->orderBy('colors.id')
                      // ->groupBy('variants.id')
                      ->get();

      dd($products);
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
      dd($variant, $product);

      return view('admin.edit', compact('product'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
