
@extends('admin.admin')



@section('products')
  <h2>Products</h2>
  <table class="ui celled table">
  <thead>
    <tr>
        <th>ID</th>
        <th>Designation</th>
        <th>Category</th>
        <th>Price</th>
        <th>Variants</th>
        <th>Color</th>
        <th>Size</th>
        <th>Stock</th>
        <th>Tags</th>
        <th>Online</th>
        <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->designation }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->price }}</td>
        <td>Picture</td>
        <td>{{ App\Variant::where() }} Color</td>
        <td>Size</td>
        <td>Stock</td>
        <td>Tags</td>
        <td>Online</td>
        <td>Edit</td>
        {{-- <p><a href="{{ route('news.edit', $post) }}">Éditer</a></p> --}}
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr><th colspan="11">
      <div class="ui right floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="item">1</a>
        <a class="item">2</a>
        <a class="item">3</a>
        <a class="item">4</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
    </th>
  </tr></tfoot>
</table>

@stop
