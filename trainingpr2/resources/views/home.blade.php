@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <table class="table">--}}
{{--        <thead class="thead-dark">--}}
{{--        <tr>--}}
{{--            <th scope="col">#</th>--}}
{{--            <th scope="col">Title</th>--}}
{{--            <th scope="col">Content</th>--}}
{{--            <th scope="col">Img</th>--}}
{{--            <th scope="col">Category</th>--}}
{{--            <th scope="col">Tags</th>--}}
{{--            <th scope="col">Operations</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($articles as $article)--}}
{{--        <tr>--}}
{{--            <th scope="row">{{ $article->id }}</th>--}}
{{--            <td>{{ $article->title }}</td>--}}
{{--            <td>{{ $article->full_text }}</td>--}}

{{--            <td>--}}
{{--                @if ($article->image)--}}
{{--                    <a href="{{ route('articles.show', $article->id) }}">--}}
{{--                        <img src="{{ asset('storage/' . str_replace('public/', '', $article->image)) }}" alt="{{ $article->title }}" height="100px" />--}}
{{--                    </a>--}}
{{--                @else--}}
{{--                    No Image--}}
{{--                @endif--}}
{{--            </td>--}}

{{--            <td>--}}
{{--                @if ($article->category_id)--}}
{{--                    {{ $article->category_id }}--}}
{{--                @else--}}
{{--                    No Category--}}
{{--                @endif--}}
{{--            </td>--}}
{{--            <td>{{ $article->tag_id }}</td>--}}
{{--            <td>--}}
{{--                <a class="btn btn-primary btn-sm" href="{{ route('articles.edit', $article->id) }}">Edit--}}
{{--                    <i class="fas fa-edit"></i>--}}
{{--                </a>--}}
{{--                <form class="d-inline" action="{{ route('articles.show', $article->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"> Delete</i></button>--}}
{{--                </form>--}}
{{--            </td>--}}
{{--            @endforeach--}}
{{--        </tr>--}}

{{--        </tbody>--}}
{{--    </table>--}}

{{--    <a class="btn btn-primary btn-sm" href="{{ route('articles.create') }}">Create Article</a>--}}

@endsection
