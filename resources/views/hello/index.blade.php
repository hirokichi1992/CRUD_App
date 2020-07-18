@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<p>{{$msg}}</p>
@if(count($errors) > 0)
<div>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/hello" method="post">
    <table>
        @csrf
        <tr>
            <th>name: </th>
            <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        <tr>
            <th>mail: </th>
            <td><input type="text" name="mail" value="{{old('mail')}}"></td>
        </tr>
        <tr>
            <th>age: </th>
            <td><input type="text" name="age" value="{{old('age')}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="送信する"></td>
        </tr>
    </table>
</form>

<!-- componentとして使う場合 -->
<!-- @component('components.message')
    @slot('msg_title')
        CAUTION!
    @endslot

    @slot('msg_content')
        これはメッセージの表示です。
    @endslot
    @endcomponent -->

<!-- サブビューとして使う場合 -->
<!-- @include('components.message', ['msg_title' => 'OK', 'msg_content' => 'サブビューです。']) -->

@endsection

@section('footer')
copyright 2020 hirokichi1992.
@endsection