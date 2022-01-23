@extends('layout.frontend')

@section('content')

<h2>Hello {{ $oUser->name }}</h2>
<a href="{{ url('/logout') }}">logout</a>
@endsection
