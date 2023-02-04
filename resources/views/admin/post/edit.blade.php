@extends('layouts.admin')
@section('contents')
    <form action="{{route('admin.post.update', $post->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$post->title}}">
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="post_content" class="form-control" id="content" rows="3">{{$post->post_content}}</textarea>
        </div>
        @error('post_content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{$post->image}}">
        </div>
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="form-select" aria-label="Categories" name="category_id">
            @foreach($categories as $category)
                <option {{$category->id === $post->category->id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>

        <select class="form-select mt-3" multiple aria-label="Tags" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->title}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success mt-3">Update post</button>
        <a href="{{route('admin.post.show', $post->id)}}" class="btn btn-warning mt-3">Go back</a>
    </form>
@endsection
