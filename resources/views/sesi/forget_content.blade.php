{{-- Konten pengiriman email untuk reset password --}}
<h4>Hai, Kamu ada permintaan reset password, Silahkan klik link di bawah ini untuk melakukan reset password</h4>
<br><br>
<a href="{{ route('session.forget.form', ['token' => $token]) }}">Klik di sini</a>