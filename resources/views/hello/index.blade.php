@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<table><tr><th>Name</th><th>Mail</th><th>Age</th></tr>
@foreach($items as $item)
<tr><td>{{$item->name}}</td><td>{{$item->mail}}</td><td>{{$item->age}}</td></tr>
@endforeach
</table>

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