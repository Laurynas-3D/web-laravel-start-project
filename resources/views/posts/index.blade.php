@extends('layouts.app')

@section('content')
<h1>Posts</h1>
@if (count($posts) > 0)
    @foreach($posts as $post)
    <div class="well">
    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    <small class="text_gray">Written on {{$post->created_at}}</small>
    </div>
    @endforeach
    
    {{$posts->links()}} {{-- to enable pagination; public function index() PostsController.php Post::orderBy('title', 'desc')->paginate(10); --}}
@else
<p>No posts found</p>    
@endif
@endsection