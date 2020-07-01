@extends('layouts.app')

@section('title', 'Book Details')

@section('content')

  <div class="d-flex flex-column">
    <h1>Title: {{$book['volumeInfo']['title']}}</h1>

    <div class="card flex-fill">
      <img src="{{$book['volumeInfo']['imageLinks']['medium']}}" class="card-img-top" alt="...">
      <div class="card-body">
        <!-- <h5 class="card-title">{{$book['volumeInfo']['title']}}</h5> -->
        <p class="card-text text-justify">{{strip_tags($book['volumeInfo']['description'])}}.</p>
        <p class="card-text"><small class="text-muted">Published: {{$book['volumeInfo']['publishedDate']}}</small></p>
      </div>
    </div>
  </div>

@endsection