@extends('layout.mainLayout')

<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 49%, rgb(96, 10, 255) 100%) !important;
    }
</style>

@section('content')
    <section class="main-content d-flex justify-content-center align-items-center bg-light rounded rounded-3 p-5">
        <div class="">
            <form action="{{ route('session.forget.form.act') }}" method="post">
                @csrf
                <h1 class="text-center">Forget Password</h1>

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="kelompok mt-3">
                    <label for="kelompok">New Password</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="kelompok" type="password"
                        placeholder="New Password" name="password" required autofocus>
                    @error('password')
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
