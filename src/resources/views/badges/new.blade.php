@extends('layouts.app')

@section('title' , 'New badge')

@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('badge.store') }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId">
                @error('title')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" id="description" class="form-control" rows="3"></textarea>
                @error('description')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select  class="form-select" name="type" id="type">
                    <option value="0" selected>XP</option>
                    <option value="1">Topic</option>
                    <option value="2">Reply</option>
                </select>
                @error('type')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="mb-3">
                <label for="required_points" class="form-label">Required points</label>
                <input type="number" name="required_points" id="required_points" class="form-control" min="0">
                @error('required_points')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="mb-3">
                <label for="icon_url" class="form-label">Icon url</label>
                <input type="text" name="icon_url" id="icon_url" class="form-control">
                @error('icon_url')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection