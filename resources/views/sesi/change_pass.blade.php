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
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Invalid Data",
                text: "{{ session('error') }}",
                icon: "error"
            });
        </script>
    @endif
    <section class="main-content d-flex justify-content-center align-items-center bg-light rounded rounded-3 p-5">
        <div class="">
            <form action="{{ route('session.pass.change') }}" method="post">
                @csrf
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                    @php
                        session()->forget('success');
                    @endphp
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
                    <label for="old_pass">Old Password</label>
                    <input type="password" class="form-control @error('old_pass') is-invalid @enderror" id="old_pass"
                        name="old_pass">
                    @error('old_pass')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="new_pass">New Password</label>
                    <input type="password" class="form-control" name="new_pass" id="new_pass">
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
