@extends('layout.layout')

@section('titel', 'account')

@section('navbar')
    @parent
@endsection

@section('content')
    <h1>Account</h1>
    <p>This is the account data for the user: {{Auth::user()->name}}, be careful when with changing data as once it has been changed the old information can not be recovered.</p>
    
    <div id="userInfoForm">
    <form name="change user info">
    {{ csrf_field() }}
        <input type="hidden" class="account_id" name="id" value="{{Auth::user()->id}}">
        <input type="text" class="account_name" name="name" value="{{Auth::user()->name}}"><br>
        <input type="text" class="account_name" name="email" value="{{Auth::user()->email}}"><br>
    </form>
    </div>

    @if (Auth::user()->is_admin == 1)
        <table>
        <tr>
            <th>Username</th><th>Email</th><th>Options</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->name}}</td><td>{{$user->email}}</td>
            <td>
                <a href="/edit_user?id={{$user->id}}">EDIT</a>
                <a href="/delete_user?id={{$user->id}}">DELETE</a>
            </td>
        </tr>
        @endforeach
        </table>
    @endif

    @if (Session::has('msg'))
    <div>
    <p>{{ Session::get('msg') }}</p>
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
