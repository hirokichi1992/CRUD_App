@extends('layouts.helloapp')

@section('title', 'Session')

@section('munubar')
@parent
セッションページ
@endsection

@section('content')
<p>{{$session_data}}</p>
<form action="/hello/session" method="post">
    @csrf
    <input type="text" name="input">
    <input type="submit" value="セッションを送信する">
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection