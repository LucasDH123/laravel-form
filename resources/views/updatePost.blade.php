@extends('layout.layout')

@section('titel', 'update post')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>edit post</h1>
    <p>edit a post!</p>
    <form action="{{route('editpost')}}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name='id' value="{{$post->id}}">
        <input type="text" name="title" placeholder="Post title" value="{{$post->title}}"><br>
        <textarea name="content" placeholder="Post contents"   rows="10" cols="20">{{$post->content}}</textarea><br>
        <input type="submit" value="submit"><br>
    </form>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection