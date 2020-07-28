@extends('layouts.helloapp')

<style>
    .pagination {
        font-size: 10pt;
    }

    .pagination li {
        display: inline-block;
    }

    tr th a:link {
        color: white;
    }

    tr th a:visited {
        color: white;
    }

    tr th a:hover {
        color: white;
    }

    tr th a:active {
        color: white;
    }
</style>

@section('title', 'Index')
@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
@if(Auth::check())
<p>こんにちは「 {{$user->name. '（'. $user->email . '）'}}」さん</p>
@else
<p>※ログインしていません。（<a href="/login">ログイン</a> | <a href="/register">登録</a>）</p>
@endif
<button type="button" onclick="location.href='/home'" class="btn btn-primary" style="margin-bottom: 1rem;">HOME</button>
<button type="button" onclick="location.href='/hello/add'" class="btn btn-primary" style="margin-bottom: 1rem;">Add</button>
<table style="margin-bottom: 1rem;">
    <tr>
        <th><a href="hello?sort=id">ID</a></th>
        <th><a href="hello?sort=name">Name</a></th>
        <th><a href="hello?sort=mail">Mail</a></th>
        <th><a href="hello?sort=age">Age</a></th>
        <th><a>Delete</a></th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td><a href="hello/edit?id={{$item->id}}">{{$item->id}}</a></td>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
        <td><a href="hello/del?id={{$item->id}}">Delete</a></td>
    </tr>
    @endforeach
</table>
{{ $items->appends(['sort' => $sort])->links() }}

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