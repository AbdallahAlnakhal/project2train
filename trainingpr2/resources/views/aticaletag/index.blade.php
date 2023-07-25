
@extends('layouts.app')

@section('content')


    <h2>Tags assigned to Articles</h2>
    <table class="table">
        <thead>
        <tr>

            <th>Article</th>
            <th>Tags</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>
                    @foreach($article->tags as $tag)
                        <span >{{ $tag->name }}</span>
                    @endforeach
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary btn-sm" href="{{ route('article_tags.create') }}">Create Article</a>

@endsection
