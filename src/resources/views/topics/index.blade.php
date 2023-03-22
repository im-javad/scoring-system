@extends('layouts.app')

@section('title' , 'Topics')

@section('content')
    <div class="container">
      <div class="row">
        @foreach($topics as $topic)
        <div class="col-12 col-lg-6 my-3">
          <div class="card text-center">
            <div class="card-header"></div>
            <div class="card-body">
              <h5 class="card-title">{{ $topic->title }}</h5>
              <p class="card-text">{{ substr($topic->text , 0 , 100) }}......</p>
              <a href="{{ route('topic.show' , $topic->id) }}" class="btn btn-primary">Details</a>
            </div>
            <div class="card-footer text-muted">created by {{ $topic->user->name }} in {{ $topic->created_at }}</div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection 
