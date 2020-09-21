@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                  Your Blog Posts
                </div>
                <div class="card-body">
                  {{-- <h5 class="card-title">Special title treatment</h5> --}}
                  {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                  <a href="/posts/create" class="btn btn-primary">Create Post</a>
                </div>
              </div>

              @if(count($posts) > 0 )
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <th scope="row">{{$post->title}}</th>
                            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a></td>
                                <td>    
                                    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                                {!!Form::close()!!}</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <div class="card mt-4">
                    <div class="card-body">
                        <p>You have no posts</p>
                    </div>
                </div>
              @endif
              

        </div>
    </div>
</div>
@endsection
