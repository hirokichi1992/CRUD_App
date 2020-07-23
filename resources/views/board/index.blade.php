@extends('layouts.helloapp')

@section('title', 'Board/Index')

@section('menubar')
@parent
ボードページ
@endsection

@section('content')
<table>
    <tr>
        <th>Data</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>
            {{$item->getData()}}
        </td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copylight 2020 hirokichi1992 
@endsection