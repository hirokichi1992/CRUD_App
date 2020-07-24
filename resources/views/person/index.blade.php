@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
@parent
インデックスページ
@endsection

@section('content')
<table>
    <tr>
        <th>Person</th>
        <th>Board</th>
    </tr>
    @foreach($hasItems as $item)
    <tr>
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
    </tr>
    @endforeach
</table>
<table style="padding-top: 20px;">
    <tr>
        <th>Person</th>
        <th>Board</th>
    </tr>
    @foreach($noItems as $item)
    <tr>
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
    </tr>
    @endforeach
</table>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection