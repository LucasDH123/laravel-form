@extends('layout.layout')

@section('titel', 'posts')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Posts</h1>
    <p>See all our posts!</p>
    
    @if (Session::has('msg'))
    <div>
    <p>{{ Session::get('msg') }}</p>
    </div>
    @endif
    
    @if ($posts)
    <table>
        <tr>
            <th>title</th><th>post author</th><th>comment count</th><th>options</th>
        </tr>
    @foreach ($posts AS $post)
        <tr>
            <td>
                <a href="{{route('detail', ['post' => $post->id])}}">{{$post->title}}</a>
            </td>
                <td>{{$post->user->name;}}</td>
                <td>{{ $post->comments->count() }}</td>
                <td>
                    @can('update', $post)
                    <a href="{{route('updatepost', ['id' => $post->id])}}">edit</a>
                    @endcan
                    @can('delete', $post)
                    <a href="{{route('deleteview', ['id' => $post->id])}}">delete</a>
                    @endcan
                </td>
        </tr>
    @endforeach
    </table>
    @endif
    <br>
    <a href="{{ url('create_post')}}">Create a post</a>
@endsection