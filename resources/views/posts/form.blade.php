<?php
  if($post->id){
    $options = ['method' => 'put', 'url' => action('PostsController@update', $post)];
  } else {
    $options = ['method' => 'posts', 'url' => action('PostsController@store')];
  }
 ?>

@include('errors/errors') 

{{ Form::model($post, $options) }}
  {{ Form::label('title', 'Titre') }}
  {{ Form::text('title', null, ['required' => true]) }}
  </br>
  {{ Form::label('slug', 'Url') }}
  {{ Form::text('slug', null) }}
  </br>
  {{ Form::label('category_id', 'Catégories') }}
  {{ Form::select('category_id', $categories, null) }}
  </br>
  {{ Form::label('tags_list[]', 'Tag') }}
  {{-- {{ Form::select('tags[]', App\Tag::pluck('name', 'id'), $post->tags->pluck('id'), ['multiple' => true]) }} --}}
  {{ Form::select('tags_list[]', App\Tag::pluck('name', 'id'), null , ['multiple' => true]) }}

  </br>
  {{ Form::label('content', 'Contenu') }}
  {{ Form::textarea('content', null, ['required' => true]) }}
  </br>
  {{ Form::label('online', 'En ligne ?') }}
  {{ Form::checkbox('online', 1, null) }}
  <button>Envoyer</button>
{{ Form::close() }}
