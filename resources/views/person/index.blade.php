@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>{{$item->getData()}}</td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection