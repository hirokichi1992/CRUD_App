@extends('layouts.helloapp')

@section('title', 'Board/Edit')

@section('menubar')
@parent
更新ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
@if(count($errors) > 0)
<div>
    <ul>
        @foreach($errors->all as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/board/edit" method="post">
<table>
    @csrf
    <input type="hidden" name="id" value="{{$form->id}}">
    <tr>
            <th>Person_id:</th>
            <td><input type="number" name="person_id" value="{{$form->person_id}}"></td>
        </tr>
        <tr>
            <th>Title:</th>
            <td><input type="text" name="title" value="{{$form->title}}"></td>
        </tr>
        <tr>
            <th>Message:</th>
            <td><input type="text" name="message" value="{{$form->message}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="更新"></td>
        </tr>
</table>
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection