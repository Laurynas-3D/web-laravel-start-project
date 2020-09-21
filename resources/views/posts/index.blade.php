@extends('layouts.app')

@section('content')
<h1>Posts</h1>
@if (count($posts) > 0)
    @foreach($posts as $post)
    {{-- <div class="card">
    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    <small class="text_gray">Written on {{$post->created_at}}</small>
    </div> --}}
    <div class="card mb-4" style="">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</h6>
          {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
          <a href="/posts/{{$post->id}}" class="card-link">Go to post</a>
        </div>
      </div>
    @endforeach
    
    {{$posts->links()}} {{-- to enable pagination; public function index() PostsController.php Post::orderBy('title', 'desc')->paginate(10); --}}
@else
<p>No posts found</p>    
@endif
@endsection