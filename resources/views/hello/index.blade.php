@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <p>ここが本文のコンテンツです。</p>
    <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p>

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