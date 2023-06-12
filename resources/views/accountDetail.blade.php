@extends('layout.layout')

@section('titel', 'account')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Account</h1>
    <p>This is the account data for the user: {{Auth::user()->name}}

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

    <div id="userInfoForm">
    <h3>update your account info</h3>
    <form name="change-user-info" action="{{route('editAccount')}}" method="post">
    {{ csrf_field() }}
        <input type="text" class="account_name" name="name" value="{{Auth::user()->name}}"><br>
        <input type="text" class="account_name" name="email" value="{{Auth::user()->email}}"><br>
        <input type="submit" class=account_submit name="submit" value="update">
    </form>
    </div>

    <div id="Changepassword">
    <h3>Change your password</h3>
    <form name="change-user-password" action="{{route('editPassword')}}" method="post">
    {{ csrf_field() }}
        <input type="password" class="account_password" name="new_password" placeholder="new password"><br>
        <input type="password" class="account_confirm_password" name="confirm_password" placeholder="confirm new password"><br>
        <input type="submit" class=account_submit name="submit" value="update">
    </form>
    </div>

    <div id="admin menu">
    @if (Auth::user()->is_admin == 1)
    <h3>Admin menu</h3>
        <table>
        <tr>
            <th>Username</th><th>Email</th><th>Options</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td><td>{{$user->email}}</td>
            <td>
                <a href="{{route('editAccount')}}">EDIT</a>
                <a href="/delete_user?id={{$user->id}}">DELETE</a>
            </td>
        </tr>
        @endforeach
    @endif
    </div>
@endsection
