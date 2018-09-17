<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\Category;
use App\Variant;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditProductRequest;

class ProductsController extends Controller
{
    public function index()
    {
      $products = Product::
                    // ->join(Variant::where('products.id', 'variants.product_id'))
                    // ->join('variants', 'products.id', '=', 'variants.product_id')
                    with('variants')
                    ->with('etiquettes')
                    ->with('category')
                    ->get();

      $variants = Variant::with('color')->with('size')->with('pictures')->get();

      // $products = DB::table('products')
      //                 ->select('variants.id as id', 'designation', 'price', 'categories.name as category', 'colors.name as color', 'sizes.name as size', 'variants.stock as stock', 'variants.online as online', 'tags.name as tags')
      //                 ->join('variants', 'products.id', '=', 'variants.product_id')
      //                 ->join('colors', 'variants.color_id', '=', 'colors.id')
      //                 ->join('sizes', 'variants.size_id', '=', 'sizes.id')
      //                 // ->joinSub($productTags, 'product_tag', function($join) {
      //                 //     $join->on('product_tag.post_tag.post_id', '=', 'products.id');
      //                 // })
      //                 ->join('post_tag', 'post_tag.post_id', '=', 'products.id')
      //                 ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
      //                 ->join('categories', 'products.category_id', '=', 'categories.id')
      //                 ->orderBy('products.id')
      //                 ->orderBy('colors.id')
      //                 // ->groupBy('variants.id')
      //                 ->get();

      return view('admin.products.index', compact('products', 'variants'));
    }

    public function create()
    {
      $product = new Product;
      $categories = Category::pluck('name', 'id');
      return view('admin.products.create', compact('product', 'categories'));
    }

    public function store(EditProductRequest $request)
    {
      // dd($request);
      $product = new Product;
      $product->designation = $request->designation;
      $product->description = $request->description;
      $product->weight = $request->weight;
      $product->price = $request->price;
      $product->reduction = $request->reduction;
      $product->material = $request->material;
      $product->category_id = $request->category_id;
      $product->save();
      $product->etiquettes()->sync($request->etiquettes_list);
      $product->update();
      // return redirect(route('admin.products.index'));
    }

    public function show()
    {

    }

    public function edit($id)
    {
      $product = Product::findOrFail($id);
      $categories = Category::pluck('name', 'id');
      return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update($product, EditProductRequest $request)
    {
      $product = Product::findOrFail($product);
      $product->update($request->all());
      return redirect(route('products.index'));
    }

    public function destroy()
    {

    }

}
