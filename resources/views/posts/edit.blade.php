@extends('welcome')

@section('content')

<h1>Editer {{ $post->id }}</h1>

@include('posts.form')

{{-- {{ Form::model($post, ['method' => 'put', 'url' => route('news.update', $post)]) }}
  {{ Form::label('title', 'Titre') }}
  {{ Form::text('title', null, ['attribute' => 'require']) }}
  </br>
  {{ Form::label('slug', 'Url') }}
  {{ Form::text('slug', null, ['attribute' => 'require']) }}
  </br>
  {{ Form::label('category_id', 'Catégories') }}
  {{ Form::select('category_id', $categories, null) }}
  </br>
  {{ Form::label('content', 'Contenu') }}
  {{ Form::textarea('content', null, ['attribute' => 'require']) }}
  </br>
  {{ Form::label('online', 'En ligne ?') }}
  {{ Form::checkbox('online', 1, null) }}
  <button>Envoyer</button>
{{ Form::close() }} --}}

@stop
