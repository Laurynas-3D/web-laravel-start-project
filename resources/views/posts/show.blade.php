@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-secondary">Go Back</a>
    <div class="mt-4 mb-4">
    <h1>{{$post->title}}</h1>
    </div>
    {{-- without parsing html --}}
    {{-- <div class="text_gray">{{$post->body}}</div>  --}}

    {{-- with parsing html --}}
    <div class="text_gray">{!!$post->body!!}</div>
    <hr>
    <small class="text_gray">Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

    {{-- pull-right does not work in bootstrap 4; use 'float-right' --}}
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection