@extends('layouts.helloapp')

@section('title', 'Board/Index')

@section('menubar')
@parent
ボードページ
@endsection

@section('content')
<table>
    <tr>
        <th>Board_id</th>
        <th>Person_id</th>
        <th>Message</th>
        <th>Name</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>
            {{$item->id}}
        </td>
        <td>
            {{$item->person->id}}
        </td>
        <td>
            {{$item->message}}
        </td>
        <td>
            {{$item->person->name}}
        </td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection