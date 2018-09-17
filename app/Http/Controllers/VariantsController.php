<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Variant;
use App\Size;
use App\Color;
use App\Http\Requests\EditVariantRequest;

class VariantsController extends Controller
{
  public function create($product)
  {
    // dd($product);
    $variant = new Variant;
    // $variant->product_id = $product;
    $product = Product::findOrFail($product);
    $sizes = Size::pluck('name', 'id');
    $colors = Color::pluck('name', 'id');
    // dd($variant);
    return view('admin.variants.create', compact('variant', 'product', 'sizes', 'colors'));
  }

  public function store(EditVariantRequest $request)
  {
    // dd($request);
    $variant = Variant::create($request->all());
    return redirect(route('products.index'));
  }

  public function update($variant, EditVariantRequest $request)
  {
    // dd($variant);
    $variant = Variant::findOrFail($variant);
    $variant->update($request->all());
    return redirect(route('products.index'));
  }

  public function edit($id)
  {
    // dd($product);
    $variant = Variant::findOrFail($id);
    $product = Product::findOrFail($variant->product_id);
    $sizes = Size::pluck('name', 'id');
    $colors = Color::pluck('name', 'id');
    return view('admin.variants.edit', compact('variant', 'sizes', 'colors', 'product'));
    // return view('admin.variants.edit', compact('variant'));

  }


}
