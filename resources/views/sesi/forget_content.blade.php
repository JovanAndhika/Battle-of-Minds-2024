<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</head>
<style>

</style>

{{-- Konten pengiriman email untuk reset password --}}
<img style="max-width: 500px;" src="{{ $message->embed(public_path() . '/asset/logo-main.png') }}" alt="">
<br>
<h1>Hai, Kamu ada permintaan reset password, Silahkan klik link di bawah ini untuk melakukan reset password</h1>
<br><br>
<a href="{{ route('session.forget.form', ['token' => $token]) }}">Click Here</a>
