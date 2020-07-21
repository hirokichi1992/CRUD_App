@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
@parent
詳細ページ
@endsection

@section('content')
@if($items != null)
@foreach($items as $item)
<table width="400px">
    <tr>
        <th width="50%">id: </th>
        <td width="50%">{{$item->id}}</td>
    </tr>
    <tr>
        <th width="50%">name: </th>
        <td width="50%">{{$item->name}}</td>
    </tr>
</table>
@endforeach
@endif
@endsection

@section('footer')
copyright 2020 hirokichi1992
@endsection