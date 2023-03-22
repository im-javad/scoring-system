@extends('layouts.app')

@section('title' , "New topic")

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form action="{{ route('topic.store') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
              type="text"
              class="form-control"
              id="title"
              placeholder="for example -> server problem"
              name="title"
            />
            @error('title')
              <strong class="text-danger">{{ $message }}</strong>
            @enderror
          </div>
          <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" id="text" rows="5" placeholder="explain your problem..." name="text"></textarea>
            @error('text')
              <strong class="text-danger">{{ $message }}</strong>
            @enderror
          </div>
          <div class="d-grid gap-2 col-6 mx-auto mb-3">
            <button class="btn btn-primary" type="submit">Create</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection 
