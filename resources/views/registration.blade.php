@extends('layout.mainlayout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    body {
        color: white;
        background: linear-gradient(180deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 49%, rgba(0, 212, 255, 1) 100%);
        height: 200vh !important;
    }

    .form-text {
        color: white;
    }

    .title {
        font-size: 45px;
        font-weight: bold;
        margin: 20px;
    }

    .form-content {
        border: 5px solid white;
        padding: 30px;
        box-shadow: 1px 5px 5px 1px #888888;
    }

    /*logo */
    i {
        font-size: 20px;
        margin-right: 5px;
    }

    .btn {
        background-color: #004792;
        width: 100%;
    }

    .btn:hover {
        background-color: #0070BB;
    }

    /* field input */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select#jenisKonsumsi,
    select,
    textarea {
        background-color: transparent;
        border: 3px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        color: white;
    }

    input[type="file"] {
        background-color: transparent;
        border: 3px solid #ccc;
        border-radius: 5px;
        color: white;
    }

    select#jenisKonsumsi {
        color: #72A0C1;
        border-color: 1px solid #004170;
        font-size: 15px;
    }

    /* placeholder */
    input[type="text"]::placeholder,
    input[type="email"]::placeholder,
    input[type="password"]::placeholder,
    select::placeholder,
    select#jenisKonsumsi::placeholder,
    textarea::placeholder {
        color: #B0E0E6;
        font-size: 15px;
    }

    /* input field */
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select:focus,
    textarea:focus {
        background-color: rgba(255, 255, 255, 0.5);
        border-color: 2px solid #004170;
    }
</style>
@endsection

@include('partials.navbarshort')
@section('content')
<div class="container container-registration">

    <div class="title d-flex justify-content-center">REGISTRATION</div>

        <div class="form-content">

            <form method="POST" action="{{ route('storeRegistration') }}" enctype="multipart/form-data"
                id="registrationForm">
                @csrf

            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" placeholder=" " value="{{ old('asalSekolah') }}" required>
                        <label for="asalSekolah" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-school"><path d="M14 22v-4a2 2 0 1 0-4 0v4"/><path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2"/><path d="M18 5v17"/><path d="m4 6 8-4 8 4"/><path d="M6 5v17"/><circle cx="12" cy="9" r="2"/></svg>  
                            Asal Sekolah</label>
                    </div>
                    @error('asalSekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="kontakSekolah" class="form-label">Kontak Sekolah (ex: email, no.telp)</label>
                    <input type="text" id="kontakSekolah" name="kontakSekolah" class="form-control @error('kontakSekolah') is-invalid @enderror" placeholder="Masukkan kontak sekolah" value="{{ old('kontakSekolah') }}" required>
                    @error('kontakSekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="floating-label">
                            <input type="text" class="form-control @error('usernameKelompok') is-invalid @enderror"
                                id="usernameKelompok" name="usernameKelompok" placeholder=""
                                value="{{ old('usernameKelompok') }}" required>
                            <label for="usernameKelompok" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-user">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                    <circle cx="12" cy="7" r="4" />
                                </svg>
                                Username Kelompok
                            </label>
                            @error('usernameKelompok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-user"></i>
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" placeholder="Masukkan kelas" value="{{ old('kelas') }}" required>
                    @error('kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-user"></i>
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="Masukkan jurusan (IPA/IPS/BAHASA)" value="{{ old('jurusan') }}" required>
                    @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-user"></i>
                    <label for="kontakPerwakilan" class="form-label">Kontak Perwakilan Kelompok ( id line / nomor wa )</label>
                    <input type="text" class="form-control @error('kontakPerwakilan') is-invalid @enderror" id="kontakPerwakilan" name="kontakPerwakilan" placeholder="Masukkan kontak perwakilan kelompok" value="{{ old('kontakPerwakilan') }}" required>
                    @error('kontakPerwakilan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-lock"></i>
                    <label for="inputPassword5" class="form-label">Password kelompok (buatlah password untuk login)</label>
                    <input type="password" id="inputPassword5" name="passPeserta" class="form-control" aria-describedby="passwordHelpBlock" placeholder="Masukkan password" required>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-lock"></i>
                    <label for="inputConfirmPassword5" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmPass" class="form-control @error('confirmPass') is-invalid @enderror" name="confirmPass" aria-describedby="passwordHelpBlock" placeholder="Masukkan confirm password" value="{{ old('confirmPass') }}" required>
                    <div id="confirmPasswordError" class="invalid-feedback" style="display: none;">Password is not the same</div>
                    @error('confirmPass')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if (session()->has('password_not_same'))
                    <div class="invalid-feedback">password is not the same</div>
                    @endif
                </div>
            </div>

                <script>
                    document.getElementById("confirmPass").addEventListener("keyup", function() {
                        var password = document.getElementById("inputPassword5").value;
                        var confirmPassword = document.getElementById("confirmPass").value;
                        var confirmPasswordError = document.getElementById("confirmPasswordError");

                        if (password === confirmPassword) {
                            $(document).ready(function() {
                                $('#btn-submit').prop('disabled', false);
                            });
                            confirmPasswordError.style.display = "none";
                        } else {
                            $(document).ready(function() {

                                $('#btn-submit').prop('disabled', true);
                            });
                            confirmPasswordError.style.display = "block";
                        }
                    });
                </script>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-person"></i>
                    <label for="namaKetua" class="form-label">Nama Ketua (Member 1)</label>
                    <input type="text" class="form-control @error('namaKetua') is-invalid @enderror" id="namaKetua" name="namaKetua" placeholder="Masukkan nama ketua" value="{{ old('namaKetua') }}" required>
                    @error('namaKetua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <!-- <i class="fas fa-envelope"> -->
                    <label for="emailKetua" class="form-label">Email Ketua</label>
                    <input type="email" class="form-control @error('emailKetua') is-invalid @enderror" id="emailKetua" name="emailKetua" placeholder="example@gmail.com" value="{{ old('emailKetua') }}" required>
                    @error('emailKetua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <i class="fas fa-user"></i>
                    <label for="kerabatSatu" class="form-label">Kontak kerabat member 1 yang bisa dihubungi</label>
                    <input type="text" class="form-control @error('kerabatSatu') is-invalid @enderror" id="kerabatSatu" name="kerabatSatu" placeholder="(no.wa / no.telp)" value="{{ old('kerabatSatu') }}" required>
                    @error('kerabatSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- <i class="fas fa-person"> -->
                    <label for="namaKedua" class="form-label">Nama Member 2</label>
                    <input type="text" id="namaKedua" name="namaKedua" class="form-control @error('namaKedua') is-invalid @enderror" placeholder="Masukkan nama member 2" value="{{ old('namaKedua') }}" required>
                    @error('namaKedua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="kerabatDua" class="form-label">Kontak Kerabat member 2 yang bisa dihubungi</label>
                    <input type="text" id="kerabatDua" name="kerabatDua" class="form-control @error('kerabatDua') is-invalid @enderror" placeholder="(no.wa / no.telp)" value="{{ old('kerabatDua') }}" required>
                    @error('kerabatDua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- <i class="fas fa-person"> -->
                    <label for="namaKetiga" class="form-label">Nama Member 3</label>
                    <input type="text" id="namaKetiga" name="namaKetiga" class="form-control @error('namaKetiga') is-invalid @enderror" placeholder="Masukkan nama member 3" value="{{ old('namaKetiga') }}" required>
                    @error('namaKetiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="kerabatTiga" class="form-label">Kontak Kerabat member 3 yang bisa dihubungi</label>
                    <input type="text" id="kerabatTiga" name="kerabatTiga" class="form-control @error('kerabatTiga') is-invalid @enderror" placeholder="(no.wa / no.telp)" value="{{ old('kerabatTiga') }}" required>
                    @error('kerabatTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-md-6">
                    <!-- <i class="fas fa-utensils"> -->
                    <label for="jenisKonsumsi" class="mb-2">Jenis Konsumsi</label>
                    <select class="form-select @error('jenisKonsumsi') is-invalid @enderror" id="jenisKonsumsi" name="jenisKonsumsi" aria-label="Default select example" required>
                        <option selected>Pilih jenis konsumsi...</option>
                        <option value="normal">Normal</option>
                        <option value="vege">Vege</option>
                        <option value="vegan">Vegan</option>
                    </select>
                    @error('jenisKonsumsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <!-- <i class="fas fa-allergies"></i> -->
                    <label for="alergi" class="form-label">Apakah ada anggota yang mempunyai alergi?</label>
                    <input type="text" class="form-control @error('alergi') is-invalid @enderror" id="alergi" name="alergi" placeholder="Jika tidak ada, bisa inputkan '-'" value="{{ old('alergi') }}" required>
                    @error('alergi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="buktiTransaksi" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-circle-dollar-sign">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                <path d="M12 18V6" />
                            </svg>

                            Bukti transaksi</label>
                        <input class="form-control input-transaksi @error('buktiTransaksi') is-invalid @enderror"
                            type="file" name="buktiTransaksi" required>
                        @error('buktiTransaksi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <button type="submit" id="btn-submit" class="btn btn-primary btn-lg mt-2">SUBMIT</button>
        </form>
    </div>
</div>

    <script>
        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Menghentikan aksi bawaan formulir
            Swal.fire({
                title: "Confirm Registration?",
                text: "Click yes to register",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, register"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lanjutkan dengan pengiriman formulir jika pengguna menekan tombol "Yes"
                    this.submit();
                }
            });
        });
    </script>
@endsection
