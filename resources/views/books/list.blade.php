@extends('layouts.app')

@section('title', 'Books List')

@section('content')
    <h1>List</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($books['items'] as $book)
        <tr>
          <th scope="row">{{$book['id']}}</th>
          <td>{{$book['volumeInfo']['title']}}</td>
          <td>
            <a href="{{ route('delete_book', ['id' => $book['id']]) }}" class="btn btn-link"> <i class="fa fa-trash"></i></a>
            <a href="{{ route('details_book', ['id' => $book['id']]) }}"  class="btn btn-link"> <i class="fa fa-eye"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection