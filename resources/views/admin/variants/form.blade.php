<?php
  if($variant->id){
    $options = ['method' => 'put', 'url' => action('VariantsController@update', $variant)];
  } else {
    $options = ['method' => 'posts', 'url' => action('VariantsController@store')];
  }
 ?>

{{-- @include('errors/errors') --}}
<div class="ui form">
{{ Form::model($variant, $options) }}
  {{ Form::hidden('product_id', $product->id, null, ['class' => 'no-visible']) }}
  <div class="field">
    {{ Form::label('stock', 'Stock') }}
    {{ Form::number('stock', null, ['required' => true]) }}
  </div>
  <div class="field">
    {{ Form::label('size_id', 'Sizes') }}
    {{ Form::select('size_id', $sizes, null, ['class' => 'ui fluid dropdown']) }}
  </div>
  <div class="field">
    {{ Form::label('color_id', 'Colors') }}
    {{ Form::select('color_id', $colors, null, ['class' => 'ui fluid dropdown']) }}
  </div>
  <div class="field">
    {{ Form::label('online', 'En ligne ?') }}
    {{ Form::checkbox('online', 1, null) }}
  </div>
  <button class="ui submit secondary button">Submit</button>
  <a href="{{ route('products.index') }}"><div class="ui submit secondary button">Cancel</div></a>
{{ Form::close() }}
</div>
