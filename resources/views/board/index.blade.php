@extends('layouts.helloapp')

@section('title', 'Board/Index')

@section('menubar')
@parent
ボードページ
@endsection

@section('content')
<button type="button" onclick="location.href='/board/add'" class="btn btn-primary" style="margin-bottom: 1rem;">Add</button>
<table>
    <tr>
        <th>Board_id</th>
        <th>Person_id</th>
        <th>Message</th>
        <th>Name</th>
        <th>Delete</th>
    </tr>
    @foreach($items as $item)
    <tr>
        <td>
            <a href="board/edit?id={{$item->id}}">{{$item->id}}</a>
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
        <td>
            <a href="board/del?id={{$item->id}}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection