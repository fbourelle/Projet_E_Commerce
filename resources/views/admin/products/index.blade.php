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
        <th>Tags</th>
        <th scope="6">Variants</th>
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
        <td>
          @foreach($product->etiquettes as $etiquette)
            <div class="ui red horizontal label">{{ $etiquette->name }}</div>
          @endforeach
        </td>
        <td>
            <table>
              <thead>
                <tr>
                  <th>id</th>
                  <th>size</th>
                  <th>color</th>
                  <th>picture</th>
                  <th>stock</th>
                  <th>online</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product->variants as $variant)
                <tr>
                  <td>{{ $variant->id }}</td>
                  <td>{{ $variant->size->name }}</td>
                  <td>{{ $variant->color->name }}</td>
                  <td>pictures</td>
                  <td>{{ $variant->stock }}</td>
                  <td>{{ $variant->online }}</td>
                </tr>
                  @endforeach
              </tbody>
            </table>

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
