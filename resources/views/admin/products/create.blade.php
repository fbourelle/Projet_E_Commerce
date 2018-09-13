@extends('welcome')

@section('content')

<h1>Ajouter un nouveau produit</h1>

@include('admin.products.form')

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
