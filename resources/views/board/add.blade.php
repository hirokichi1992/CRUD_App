@extends('layouts.helloapp')

@section('title', 'Board/Add')

@section('menubar')
@parent
投稿ページ
@endsection

@section('content')
<form action="/board/add" method="post">
    <table>
        @csrf
        <tr>
            <th>person_id: </th>
            <td><input type="number" name="person_id"></td>
        </tr>
        <tr>
            <th>title: </th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>message: </th>
            <td><input type="text" name="message"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="投稿する"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection