@extends('layouts.application')
@section('contents')
    @foreach($myPosts as $post)
        <h1>{{$post->title}}</h1>
        <div>{{$post->post_content}}</div>
        <div>{{$post->likes}}</div>
    @endforeach
@endsection
