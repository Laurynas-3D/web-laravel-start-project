@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-outline-secondary">Go Back</a>
    <div class="mt-4 mb-4">
    <h1>{{$post->title}}</h1>
    <img style="width: 110px" src="/storage/cover_images/{{$post->cover_image}}" class="card-img" alt="post-img">
    <br>
    </div>
    {{-- without parsing html --}}
    {{-- <div class="text_gray">{{$post->body}}</div>  --}}

    {{-- with parsing html --}}
    <div class="text_gray">{!!$post->body!!}</div>
    <hr>
    <small class="text_gray">Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>

     @if(!Auth::guest()) {{-- If user is no a guest, they will be able to see this --}}
        @if(Auth::user()->id == $post->user_id) {{-- Other users cannot edit your posts, and you can't theirs --}}

            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            {{-- pull-right does not work in bootstrap 4; use 'float-right' --}}
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection