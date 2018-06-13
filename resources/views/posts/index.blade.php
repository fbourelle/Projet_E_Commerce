@extends('welcome')

@section('content')

<h1>Posts</h1>
  @foreach($posts as $post)
    <h1>{{ $post->title }}</h1>
    <p><em>{{ $post->category->name }}</em></p>
    <p>{{ $post->content }}</p>
    <p><a href="{{ route('news.edit', $post) }}">Éditer</a></p>
  @endforeach
@stop
