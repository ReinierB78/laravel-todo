@extends('layout.frontend')

@section('content')
<nav class="navbar navbar-light bg-primary text-white shadow mb-3">
    <div class="container d-flex align-items-center">
        <a class="navbar-brand text-white">Awesome todo app</a>
        <div class="d-flex">
            <p class="m-0 me-3">Hello {{ $oUser->name }}</p>
            <a href="{{ url('/logout') }}">logout</a>
        </div>
    </div>
</nav>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" class="card p-3 mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button">Add action</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
