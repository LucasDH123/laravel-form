@extends('layout.layout')

@section('titel', 'detail')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>{{$post->title}}</h1>
    <h2>By {{$post->user->name}}</h2>
    <p>{{$post->content}}</p>
    
    <div id="comments">
        <h3>Have somthing to say? Leave a comment!</h3>
        @if (Auth::check())
            <form action="{{ route('postComment')}}" method="post">
            {{ csrf_field() }}
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <textarea name="content" placeholder="comment here" rows="3"></textarea><br>
                <input type="submit" value="post">
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
              
        @endif
        @if (!Auth::check())
            <p>You need to be logged in to comment on posts. Click <a href="{{url('login')}}">here</a> to login.</p>
        @endif
        <h3>Comments:</h3>
        @foreach ($comments AS $comment)
            <table id="comment-table">
                <tr>
                    <th>{{$comment->user->name}}</th>
                </tr>
                <tr>
                    <td>{{$comment->content}}</td>
                </tr>
            </table>
        @endforeach
    </div>
@endsection