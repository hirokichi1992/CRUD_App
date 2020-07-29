@extends('layouts.helloapp')

@section('title', 'Hello.find')

@section('menubar')
@parent
名前検索ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/hello/find" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="name" value="{{$name}}" class="form-control" placeholder="Enter name" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </div>
</form>
@if(isset($items))
検索結果
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td><a href="/hello/edit?id={{$item->id}}">{{$item->id}}</a></td>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection