@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center;">Function List</div>
                <div class="card" style="width: 18rem; margin: 1rem auto;">
                    <div class="card-body">
                        <h5 class="card-title">Hello</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/hello" class="btn btn-primary">Go to Hello</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin: 1rem auto;">
                    <div class="card-body">
                        <h5 class="card-title">Person</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/person" class="btn btn-primary">Go to Person</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin: 1rem auto;">
                    <div class="card-body">
                        <h5 class="card-title">Board</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/board" class="btn btn-primary">Go to Board</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem; margin: 1rem auto;">
                    <div class="card-body">
                        <h5 class="card-title">RESTApp</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="/rest" class="btn btn-primary">Go to RESTApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
