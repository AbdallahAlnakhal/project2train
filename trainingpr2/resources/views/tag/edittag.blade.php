@extends('layouts.app')

@section('content')
    <h1>Edit Tag</h1>

    <form method="POST" action="{{ route('tags.update', $tag->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" id="name" name="name" value="{{ $tag->name }}" class="form-control">
        </div>



        <button type="submit" class="btn btn-primary">Update Tags</button>
    </form>
@endsection
