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
@endsection