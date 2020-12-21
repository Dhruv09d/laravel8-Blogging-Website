@extends('layouts.app')

@section('content')
    <Script>
        function show() {
            var x = document.getElementById("myDIV");
            x.style.display = "block";
        }
        function hide() {
            var x = document.getElementById("myDIV");
            x.style.display = "none";
        }   
    </script>

    <a href="https://localhost/dbms/BlogProject/public/posts" class="btn btn-light">Go Back</a>
    <hr>
    <h1>{{$post->title}}</h1>
    <div class="row">
        <div class="col-md-12">
            <img style="width:100%" src="https://localhost/dbms/BlogProject/public/storage/cover_images/{{$post->cover_image}}">
        </div>
    </div>
    <p>{{$post->body}}</p>
    
    <hr>
    <small>written on {{$post->created_at}}</small>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
    <a href="https://localhost/dbms/BlogProject/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    <button class="btn btn-danger" onclick="show()">Delete</button>

    
    <br><br>
    <div id="myDIV" style="display:none">
        <p>Are you sure, you want to delete this blog?</p>
        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Yes', ['class'=> 'btn btn-danger'])}}
        {!!Form::close()!!}
        <button class="btn btn-default" onclick="hide()">No</button> 
    </div>
        @endif
    @endif

@endsection 