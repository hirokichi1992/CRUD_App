@extends('layouts.helloapp')

@section('title', 'Person.Delete')

@section('menubar')
@parent
削除確認ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/person/del" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>name:</th>
            <td>{{$form->name}}</td>
        </tr>
        <tr>
            <th>mail:</th>
            <td>{{$form->mail}}</td>
        </tr>
        <tr>
            <th>age:</th>
            <td>{{$form->age}}</td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="削除"></td>
        </tr>
    </table>
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection