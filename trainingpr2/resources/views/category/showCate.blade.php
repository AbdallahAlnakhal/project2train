@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>

    </tr>
    </thead>
    <tbody>
    <tr>
    @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>

            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">Edite
                    <i class="fas fa-edit"></i>
                </a>
                <form class="d-inline" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"> Delete</i></button>
                </form>

            </td>
        </tr>
        @endforeach


    </tbody>
</table>

<a class="btn btn-primary btn-sm" href="{{ route('categories.create') }}">Create Article
</a>

@endsection
