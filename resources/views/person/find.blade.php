@extends('layouts.helloapp')

@section('title', 'Person.find')

@section('menubar')
@parent
検索ページ
@endsection

@section('content')
<button type="button" onclick="history.back()" class="btn btn-primary" style="margin-bottom: 1rem;">Back</button>
<form action="/person/find" method="post">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="input" value="{{$input}}" class="form-control" placeholder="Enter age" aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </div>
</form>
@if(isset($item))
<table>
    <tr>
        <td>{{$item->getData()}}</td>
    </tr>
</table>
@endif
@endsection

@section('footer')
copylight 2020 hirokichi1992
@endsection