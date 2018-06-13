<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
      $products = Product::with('category')
                    ->join('variants', 'products.id', '=', 'variants.product_id')
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

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
