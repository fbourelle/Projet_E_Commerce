@extends('welcome')

@section('content')

<h1>Créer un nouvel article</h1>

@include('posts.form')

{{-- {{ Form::open(['url' => route('news.store')]) }}
  {{ Form::label('title', 'Titre') }}
  {{ Form::text('title', null, ['attribute' => 'require']) }}
  </br>
  {{ Form::label('slug', 'Url') }}
  {{ Form::text('slug', null, ['attribute' => 'require']) }}
</br>
  {{ Form::label('content', 'Contenu') }}
  {{ Form::textarea('content', null, ['attribute' => 'require']) }}
  <button>Envoyer</button>
{{ Form::close() }} --}}

@stop
