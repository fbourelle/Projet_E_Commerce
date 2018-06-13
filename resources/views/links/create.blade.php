@extends('welcome')

@section('content')

<h1>Raccourcir un nouveau lien</h1>

<form action="{{ route('links.store') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <label for="url">Lien à raccourcir</label>
  <input type="url" name="url" id="url" placeholder="http://...">
  <button>Raccourcir</button>
</form>

@stop
