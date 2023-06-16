@extends('layout.layout')

@section('titel', 'confirm user delete')

@section('navbar')
   
@endsection

@section('content')
    <div class="areYouSure" >
    <p>Are you sure you want to delete this user? once delete the account cannot be recovered.</p>

    <button class="yesButton" onclick="location.href='/delete_user/{{$id}}'">Yes</button> <button class="noButton" onclick="location.href='/user_details'">No</button>
    </div>
    
@endsection