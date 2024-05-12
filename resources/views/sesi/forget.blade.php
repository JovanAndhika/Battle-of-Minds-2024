@extends('layout.mainlayout')

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: url(asset/bg-bom-main.png);
        background-position: center 35%;
        background-size: cover;
    }

    .alert {
        width: 400px;
    }
</style>

@section('content')
    <section class="main-content d-flex justify-content-center align-items-center bg-light rounded rounded-3 p-5">
        <div class="">
            <form action="{{ route('session.forget.act') }}" method="post">
                @csrf
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                    @php
                        session()->forget('success');
                    @endphp
                @endif

                @if (session('error'))
                    <script>
                        Swal.fire({
                            title: "Invalid Data",
                            text: "{{ session('error') }}",
                            icon: "error"
                        });
                    </script>
                @endif
                <h1 class="text-center">Reset Password</h1>

                <div class="kelompok mt-3">
                    <label for="kelompok">Nama Kelompok</label>
                    <input class="form-control @error('namaKelompok') is-invalid @enderror" id="kelompok" type="text"
                        name="namaKelompok" value="{{ old('namaKelompok') }}" required autofocus>
                    @error('namaKelompok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="email mt-3">
                    <label for="email">Email</label>
                    <input class="form-control @error('emailPerwakilan') is-invalid @enderror" type="text" id="email"
                        name="emailPerwakilan" value="{{ old('emailPerwakilan') }}" required>

                    @error('emailPerwakilan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button class="btn btn-info" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
@endsection
