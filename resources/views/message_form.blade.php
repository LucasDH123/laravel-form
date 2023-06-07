@extends('layout.layout')

@section('titel', 'message form')

@section('navbar')
    @parent
@endsection

@section('content')
<h1>Send your message</h1>
<p>Send a direct message to any user on the site!</p>

<form action="{{route('sendMessage')}}" method="post">
{{ csrf_field() }}
    <input type="hidden" name="fromUser" value="{{ Auth::user()->id }}">
    <label for="name" class="message_label">Send to:</label>
    <input type="text" class="message_input" name="name"><br>
    <textarea name="message" id="message_form_text" cols="28" rows="10" placeholder="put message here"></textarea><br>
    <input type="submit" name="send" value="send">
</form>

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