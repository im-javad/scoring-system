@extends('layouts.app')

@section('title')
  {{ "topic" . $topic->id }}
@endsection

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
      <h5>Replies:</h5>
      <div class="col-12 mb-3 border border-dark p-2 round rounded">
        @foreach ($replies as $reply)
          <div class="card mb-3">
            <div class="card-body">
              {{ $reply->text }}
            </div>
            <div class="card-header">created by {{ $reply->user->name }} in {{ $reply->created_at }}</div>
          </div>
        @endforeach
      </div>
      <div class="my-5">
        <form action="{{ route('reply.store' , $topic->id) }}" method="POST">
          @csrf
          <label for="replyA" class="form-label">Reply</label>
          <textarea name="text" class="form-control" id="replyA" rows="3"></textarea>
          @error('text')
              <strong class="text-danger">{{ $message }}</strong>
          @enderror
          <div class="d-grid gap-2 col-6 mx-auto mt-2">
            <button class="btn btn-primary" type="submit">Send</button>
          </div>
        </form>
      </div>
    </div>
@endsection
