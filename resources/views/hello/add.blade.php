@extends('layouts.helloapp')

@section('title', 'Add')

@section('menubar')
@parent
新規作成ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/hello/add" method="post">
    <table>
    @csrf
    <tr>
            <th>Name: </th>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td>
                <input type="text" name="mail">
            </td>
        </tr>
        <tr>
            <th>Age: </th>
            <td>
                <input type="text" name="age">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" value="新規作成">
            </td>
        </tr>
    </table>
</form>
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection