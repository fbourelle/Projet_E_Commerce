<?php
  if($product->id){
    $options = ['method' => 'put', 'url' => action('ProductsController@update', $product)];
  } else {
    $options = ['method' => 'posts', 'url' => action('ProductsController@store')];
  }
 ?>

@include('errors/errors')
<div class="ui form">
{{ Form::model($product, $options) }}
  <div class="field">
    {{ Form::label('designation', 'Designation') }}
    {{ Form::text('designation', null, ['required' => true]) }}
  </div>
  <div class="field">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['rows' => '2']) }}
  </div>
  <div class="field">
    {{ Form::label('weight', 'Weight') }}
    {{ Form::number('weight', null) }}
  </div>
  <div class="field">
    {{ Form::label('price', 'Price') }}
    {{ Form::number('price', null, ['step' => "0.01"]) }}
  </div>
  <div class="field">
    {{ Form::label('reduction', 'Reduction') }}
    {{ Form::number('reduction', null, ['max' => "100"]) }}
  </div>
  <div class="field">
    {{ Form::label('material', 'Material') }}
    {{ Form::text('material', null) }}
  </div>
  <div class="field">
    {{ Form::label('category_id', 'Catégories') }}
    {{ Form::select('category_id', $categories, null, ['class' => 'ui fluid dropdown']) }}
  </div>
  <div class="field">
    {{ Form::label('etiquettes_list[]', 'Etiquettes') }}
    {{-- {{ Form::select('tags[]', App\Tag::pluck('name', 'id'), $post->tags->pluck('id'), ['multiple' => true]) }} --}}
    {{ Form::select('etiquettes_list[]', App\Etiquette::pluck('name', 'id'), null , ['multiple' => true, 'class' => 'ui dropdown']) }}
  </div>
  <button class="ui submit secondary button">Submit</button>
  <a href="{{ route('products.index') }}"><button class="ui submit secondary button">Cancel</button></a>
{{ Form::close() }}
</div>
