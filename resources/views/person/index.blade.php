@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<button type="button" onclick="location.href='/home'" class="btn btn-primary" style="margin-bottom: 1rem;">HOME</button>
<button type="button" onclick="location.href='/person/add'" class="btn btn-primary" style="margin-bottom: 1rem;">Add</button>
<h3>List of Person has board</h3>
<table style="margin-bottom: 2rem;">
    <tr>
        <th>Person_id</th>
        <th>Method of Person Model</th>
        <th>Method of Board Model</th>
        <th>Delete</th>
    </tr>
    @foreach($hasItems as $item)
    <tr>
        <td><a href="person/edit?id={{$item->id}}">{{$item->id}}</a></td>
        <td>{{$item->getData()}}</td>
        <td>
            @if($item->boards != null)
            <table>
                @foreach($item->boards as $obj)
                <tr>
                    <td>{{$obj->getData()}}</td>
                </tr>
                @endforeach
            </table>
            @endif
        </td>
        <td><a href="person/del?id={{$item->id}}">Delete</a></td>
    </tr>
    @endforeach
</table>

<h3>List of Person hasn't board</h3>
<table>
    <tr>
        <th>Person_id</th>
        <th>Method of Person Model</th>
        <th>Method of Board Model</th>
        <th>Delete</th>

    </tr>
    @foreach($noItems as $item)
    <tr>
        <td><a href="person/edit?id={{$item->id}}">{{$item->id}}</a></td>
        <td>{{$item->getData()}}</td>
        <td>
            @if($item->boards != null)
            <table>
                <tr>
                    <td>nodata</td>
                </tr>
            </table>
            @endif
        </td>
        <td><a href="person/del?id={{$item->id}}">Delete</a></td>
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection