@extends('admin.layout.main')

@section('content')
    @include('admin.components.navbar')

    @auth
        <div class="mt-5 flex justify-center">
            <h1 class="font-bold text-3xl">Welcome Back {{ auth()->user()->username }}</h1>
        </div>
    @endauth
@endsection
