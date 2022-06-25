
@extends('layouts.main')

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('author') }}">
            <button class="btn btn-danger" type="submit">Search</button>
        </div>
        </form>
    </div>
</div>

@if ($posts->count())
<div class="card mb-3">
@if ($posts[0]->image)
        <div style="max-height: 400px; overflow:hidden;">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
        </div>
        @endif
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/posts?author={{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
    
    <p><small class="text-muted">By. <a href="/blog?author={{ $posts[0]->category->username }}"> {{ $posts[0]->author->name   }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name   }}</a> {{ $posts[0]->created_at->diffForHumans() }}</small></p>
    
    <p class="card-text">{{ $posts[0]->excerpt }}</p>

    <a href="/posts/{{$posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more...</a>

</p>
  </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $posts)
        <div class="col-md-4">
        <div class="card" style="width: 18rem;">
        <div class="position-absolute bg-dark px-3 py-3 text-white" style="background-color: rgba(0, 0, 0, 0.7)">
        <a href="/blog?category={{ $posts->category->slug }}" class="text-white text-decoration-none">{{ $posts->category->name }}</a></div>
        <img src="{{ asset('storage/' . $posts->image) }}" alt="{{ $posts->category->name }}">
    <div class="card-body">
    <h5 class="card-title">{{ $posts->title }}</h5>
    <p><small class="text-muted">By. 
        <a href="/blog?author={{ $posts->author->username }}"> {{ $posts->author->name   }}</a> 
        in 
        <a href="/blog?category={{ $posts->category->slug }}" class="text-decoration-none">{{ $posts->category->name  }}
        </a> {{ $posts->created_at->diffForHumans() }}</small></p>
    <p class="card-text">{{ $posts->excerpt }}</p>
    <a href="/posts/{{ $posts->slug }}" class="btn btn-primary">Read More</a>
  </div>
</div>
        </div>
        @endforeach
    </div>
</div>
@else
<p class="text-center fs-4">No post found.</p>
@endif

<div class="d-flex justify-content-end">
{{ $posts->paginate()->links() }}
</div>

    @endsection