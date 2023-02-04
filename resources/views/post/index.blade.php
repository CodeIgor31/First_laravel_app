@extends('layouts.application')
@section('contents')
    <a href="{{route('post.create')}}" class="btn btn-success mb-2">Create a new post</a>
    @foreach($myPosts as $post)
        <div><a href="{{route('post.show', $post->id)}}"> {{$post->id}}. {{$post->title}}</a></div>
    @endforeach
    <div class="mt-3">
        {{$myPosts->links()}}
    </div>
@endsection
