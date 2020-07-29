@extends('layouts.helloapp')

@section('title', 'Board.Delete')

@section('menubar')
@parent
削除確認ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/board/del" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>Board_id:</th>
            <td>{{$form->id}}</td>
        </tr>
        <tr>
            <th>Title:</th>
            <td>{{$form->title}}</td>
        </tr>
        <tr>
            <th>Message:</th>
            <td>{{$form->message}}</td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="削除"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection