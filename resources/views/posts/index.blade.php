@extends('welcome')

@section('content')

<h1>Posts</h1>
  @foreach($posts as $post)
    <h1>{{ $post->title }}</h1>
    <p><em>{{ $post->category->name }}</em></p>
    <p>{{ $post->content }}</p>
    <p>
      @foreach($post->tags as $tag)
        {{ $tag->name }}
      @endforeach
    </p>
    {{-- <p>{{ $post->tags->pluck('name') }}</p> --}}
    <p><a href="{{ route('news.edit', $post) }}">Éditer</a></p>
  @endforeach
@stop
