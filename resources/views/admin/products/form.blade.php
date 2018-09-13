<?php
  if($product->id){
    $options = ['method' => 'put', 'url' => action('ProductsController@update', $post)];
  } else {
    $options = ['method' => 'posts', 'url' => action('ProductsController@store')];
  }
 ?>

@include('errors/errors')

{{ Form::model($product, $options) }}
  {{ Form::label('designation', 'Designation') }}
  {{-- {{ Form::class('ui form') }} --}}
  {{ Form::text('designation', null, ['required' => true]) }}
  </br>
  {{ Form::label('description', 'Description') }}
  {{ Form::text('description', null) }}
  </br>
  {{ Form::label('weight', 'Weight') }}
  {{ Form::text('weight', null) }}
  </br>
  {{ Form::label('price', 'Price') }}
  {{ Form::text('price', null) }}
  </br>
  {{ Form::label('material', 'Material') }}
  {{ Form::text('material', null) }}
  </br>
  {{ Form::label('category_id', 'Catégories') }}
  {{ Form::select('category_id', $categories, null) }}
  </br>
  {{ Form::label('etiquettes_list[]', 'Etiquettes') }}
  {{-- {{ Form::select('tags[]', App\Tag::pluck('name', 'id'), $post->tags->pluck('id'), ['multiple' => true]) }} --}}
  {{ Form::select('etiquettes_list[]', App\Etiquette::pluck('name', 'id'), null , ['multiple' => true]) }}
  </br>
  {{ Form::label('online', 'En ligne ?') }}
  {{ Form::checkbox('online', 1, null) }}
  <button>Envoyer</button>
{{ Form::close() }}
