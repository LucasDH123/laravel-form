@extends('layout.layout')

@section('titel', 'admin edit')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Edit user</h1>


    <div id="userInfoForm">
    <h3>update the user info for: {{$user->name}}</h3>
    <form name="change-user-info" action="{{route('adminedit', ['id' => request('id')])}}" method="post">
    {{ csrf_field() }}
        <input type="hidden" name="id" value="{{request('id')}}">
        <input type="text" class="name" name="name" value="{{$user->name}}"><br>
        <input type="text" class="email" name="email" value="{{$user->email}}"><br>
        <input type="password" class="password" name="password" placeholder="Change password"><br>
        <input type="password" class="password_confirmation" name="password_confirmation" placeholder="confirm password"><br>
        <input type="submit" class=account_submit name="submit" value="update">
    </form>
    </div>
    
    @if (Session::has('msg'))
    <div>
    <p><b>{{ Session::get('msg') }}<b></p>
    </div>
    @endif

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
