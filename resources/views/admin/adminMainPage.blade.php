@extends('layout.adminMainlayout')

@section('contentAdmin')
@auth
    <div class="container">Welcome Back {{ auth()->user()->username }}</div>
@endauth
    <div><h1>Ini Main Page Admin isinya tabel data</h1></div>
@endsection