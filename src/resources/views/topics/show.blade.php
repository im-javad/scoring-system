@extends('layouts.app')

@section('title' , "Topic {{$topic->id}}")

@section('content')
    <div class="container">
      <div class="col-12">
        <div class="card text-center mt-3 mb-5">
          <div class="card-header"><h5>{{ $topic->title }}</h5></div>
          <div class="card-body">
            <p class="card-text">{{ $topic->text }}</p>
            <a href="#" class="btn btn-primary">Reply</a>
          </div>
          <div class="card-footer text-muted">created by {{ $topic->user->name }} in {{ $topic->created_at }}</div>
        </div>
      </div>
      <h5>Reply:</h5>
      <div class="col-12 mb-3 border border-dark p-2 round rounded">
      </div>
    </div>
@endsection 