@extends('layout.adminMainlayout')

@section('contentAdmin')
@auth
    <div class="container">Welcome Back {{ auth()->user()->username }}</div>
@endauth
    <div><h1>Ini homepage Admin</h1></div>
@endsection