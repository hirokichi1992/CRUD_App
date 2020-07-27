@extends('layouts.helloapp')

@section('title', 'Delete')

@section('menubar')
@parent
削除確認ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/hello/del" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>Name: </th>
            <td>{{$form->name}}</td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td>{{$form->mail}}</td>
        </tr>
        <tr>
            <th>Age: </th>
            <td>{{$form->age}}</td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" value="削除する">
            </td>
        </tr>
    </table>
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection