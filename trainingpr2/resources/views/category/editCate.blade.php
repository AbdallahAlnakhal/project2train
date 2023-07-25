@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>

    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control">
        </div>



        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
@endsection
