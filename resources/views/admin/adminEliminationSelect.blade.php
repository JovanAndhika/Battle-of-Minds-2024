@extends('layout.mainlayout')

@section('content')
<div>
    <h1>Ini halaman utama Eliminasi 1</h1>
</div>

<div>
    @foreach ($pesertas as $peserta)
    <form action="{{ route('setReady', ['peserta' => $peserta] )}}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Set</button>
    </form>
    @endforeach


</div>
@endsection