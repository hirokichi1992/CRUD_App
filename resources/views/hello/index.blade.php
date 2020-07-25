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
<table>
    <tr>
        <th><a href="hello?sort=name">Name</a></th>
        <th><a href="hello?sort=mail">Mail</a></th>
        <th><a href="hello?sort=age">Age</a></th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->mail}}</td>
        <td>{{$item->age}}</td>
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