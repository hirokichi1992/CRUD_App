@extends('layouts.helloapp')

@section('title', 'Hello.find')

@section('menubar')
@parent
名前検索ページ
@endsection

@section('content')
@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/hello/find" method="post">
    @csrf
    <div>
        <input type="text" name="name" value="{{$name}}" id="suggest">
        <button type="submit">Search</button>
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

@section('script')
<script>
    $(function() {
        $('#suggest').autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: 'GET',
                    url: 'suggest',
                    dataType: 'json',
                    cache: false,
                    data: {
                        name: request.term
                    },
                }).done(function(data) {
                    // 通信成功時
                    response(data);
                }).fail(function(err) {
                    // 通信失敗時
                    // response("エラー");
                });
            }
        });
    });
</script>
@endsection