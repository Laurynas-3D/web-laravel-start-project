@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>

    {{-- without parsing html --}}
    {{-- <div class="text_gray">{{$post->body}}</div>  --}}

    {{-- with parsing html --}}
    <div class="text_gray">{!!$post->body!!}</div>
    <hr>
    <small class="text_gray">Written on {{$post->created_at}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

    {{-- pull-right does not work in bootstrap 4; use 'float-right' --}}
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection