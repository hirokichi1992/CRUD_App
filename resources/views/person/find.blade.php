@extends('layouts.helloapp')

@section('title', 'Person.find')

@section('menubar')
@parent
検索ページ
@endsection

@section('content')
<form action="/person/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="IDを検索する">
</form>
@if(isset($item))
<table>
    <tr>
        <td>{{$item->getData()}}</td>
    </tr>
</table>
@endif
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection