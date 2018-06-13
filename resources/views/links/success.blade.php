@extends('welcome')

@section('content')

<h1>Bravo !</h1>

<p>
  <a href="{{ action('LinksController@show', ['id' => $link->id ]) }}" target="_blank">
    {{ route('link.show', $link) }}
    <!-- /r/{{ $link->id }} -->
  </a>
</p>

@stop
