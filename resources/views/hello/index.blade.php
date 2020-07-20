@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<p>{{$msg}}</p>
@if(count($errors) > 0)
<p>入力に問題があります。再入力して下さい。</p>
@endif
<form action="/hello" method="post">
    <table>
        @csrf
        @if($errors->has('msg'))
        <tr>
            <th>ERROR!</th>
            <td>{{$errors->first('msg')}}</td>
        </tr>
        @endif
        <tr>
            <th>Messages: </th>
            <td><input type="text" name="msg" value="{{old('msg')}}"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="クッキーを送信する"></td>
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