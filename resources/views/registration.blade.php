@extends('layout.mainlayout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    * {
        font-family: 'Orbitron', sans-serif;
        letter-spacing: 0.15rem;
    }

    /*
                                    input {
                                        font-family: 'Geologica', sans-serif !important;
                                        letter-spacing: 0.09rem !important;
                                    } */

    body {
        color: white;
        min-height: 100vh;
        background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 49%, rgb(96, 10, 255) 100%);
        background-attachment: fixed;
        background-position: center;
        font-weight: 800;
    }

    .form-text {
        color: white;
    }

    .title {
        font-size: 3rem;
        font-weight: bold;
        padding: 20px;
        letter-spacing: 0.3rem;
        text-shadow:
            0 0 4px #fff,
            0 0 10px #fff,
            0 0 38px #8048e0,
            0 0 73px #5f48e0;
    }

    .form-content {
        background: rgb(255, 255, 255, 0.2);
        border: 4px solid white;
        padding: 30px;
        box-shadow: 2px 10px 10px 2px #ffffff;
    }

    .form-label {
        display: grid;
        grid-template-columns: auto auto;
        user-select: none;
        margin: 0;
    }


    .form-label svg {
        margin-right: 10px;
    }

    .submit-button {
        background-color: #4606b5;
        width: 100%;
        font-weight: bold;
        border: none;
    }

    .submit-button:hover {
        background-color: #2d007a;
    }

    /* margin */
    .row {
        margin-bottom: 20px;
    }

    #namaKedua {
        margin-bottom: 20px;
    }

    /* field input */
    input[type="text"],
    input[type="email"],
    input[type="password"],
    select#jenisKonsumsi,
    select,
    textarea {
        background: transparent;
        border: 2.3px solid white !important;
        border-radius: 5px;
        padding: 14px;
        color: white;
        z-index: 1;
    }

    input[type="file"] {
        background: transparent;
        border: 3px solid #ccc;
        border-radius: 5px;
        color: white;
        z-index: 1;
        padding: 14px;
    }

    #file-upload-button,
    ::-webkit-file-upload-button {
        height: 50px !important;
        padding: 19px 15px 15px 27px !important;

    }

    .input-transaksi {
        padding: 0 !important;
        height: 50px !important;
        font-weight: bold;
    }

    select#jenisKonsumsi,
    #alergi::placeholder {
        color: white;
        font-size: 1rem;
        font-weight: bold;
    }

    /* option konsumsi */
    select#jenisKonsumsi option {
        color: black;
    }

    /* NEW FLOATING LABEL */
    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    select:focus,
    textarea:focus {
        background: transparent;
        outline: none;
        box-shadow: none;
        border-color: white;
    }

    /* Custom floating labels */
    .floating-label {
        position: relative;
        margin-bottom: 5px;
    }

    .floating-label:hover {
        cursor: text;
    }


    .floating-label input,
    .floating-label select,
    .floating-label textarea {
        background: transparent;
        border: 3px solid white;
        border-radius: 5px;
        color: white;
        z-index: 1;
        width: 100%;
    }

    .floating-label label {
        position: absolute;
        outline: none;
        left: 10px;
        top: 0;
        padding: 15px;
        padding-left: 8px;
        height: 37px;
        transition: 0.3s ease;
        transform-origin: left top;
        cursor: text;
        font-size: 1rem;
        align-self: flex-end;
    }

    .form-select {
        font-size: 1rem;
    }

    .floating-label input:focus {
        transition: 0.4s ease;
        color: white;
    }

    .floating-label input:focus~label,
    .floating-label input:not(:placeholder-shown)~label {
        padding-top: 5px;
        box-shadow: none;
        border-radius: 10px;
        color: black;
        transform: translateY(-50%) scale(0.85);
        transition: 0.4s ease;
        background: white;
    }

    .bukti-label,
    .alergi-label,
    .label-konsumsi {
        padding-bottom: 10px;
        justify-content: start;
        justify-self: start;
        height: 31px;
    }

    .lucide-briefcase-medical {
        width: 24px !important;
        height: 24px !important;
    }

    /* responsive */



    @media screen and (min-width: 768px) and (max-width: 992px) {
        :root {
            font-size: 14px;
        }

        .floating-label label {
            padding: 18px 8px;
            font-size: 0.9rem;
        }

        .floating-label input:focus,
        .floating-label input:not(:placeholder-shown) {
            padding: 18px 0 10px 14px;
        }

        .floating-label input:focus~label,
        .floating-label input:not(:placeholder-shown)~label {
            padding: 9px 8px;
            transform: translateY(-50%) scale(0.9);
        }

        .form-label svg {
            width: 24px;
            height: 24px;
            margin-top: -5px;
        }

        .form-select,
        .input-alergi::placeholder {
            font-size: 0.9rem !important;
        }

        .form-select {
            height: 52.2px;
        }
    }

    @media screen and (max-width: 768px) {

        .title {
            font-size: 2rem;
            margin-top: 80px;
        }

        :root {
            font-size: 14px;
        }

        .floating-label label {
            padding: 18px 8px;
            font-size: 0.9rem;
        }

        .floating-label input:focus,
        .floating-label input:not(:placeholder-shown) {
            padding: 18px 0 10px 14px;
        }

        .floating-label input:focus~label,
        .floating-label input:not(:placeholder-shown)~label {
            padding: 9px 8px;
            transform: translateY(-50%) scale(0.9);
        }

        .form-label svg {
            width: 24px;
            height: 24px;
            margin-top: -5px;
        }

        .form-select,
        .input-alergi::placeholder {
            font-size: 0.9rem !important;
        }

        .form-select {
            height: 52.2px;
        }




    }

    @media screen and (min-width: 320px) and (max-width: 462px) {
        .floating-label label[for="kontakSekolah"] {
            padding: 9px 8px;
        }

        .floating-label label[for="kontakSekolah"] svg {
            margin-top: 0;
        }

        .floating-label input:focus~label[for="kontakSekolah"],
        .floating-label input:not(:placeholder-shown)~label[for="kontakSekolah"] {
            padding: 1px 8px;
            transform: translateY(-50%) scale(0.9);
        }
    }

    @media screen and (min-width: 320px) and (max-width: 393px) {
        .floating-label label[for="jurusan"] {
            padding: 9px 8px;
        }

        .floating-label label[for="jurusan"] svg {
            margin-top: 0;
        }

        .floating-label input:focus~label[for="jurusan"],
        .floating-label input:not(:placeholder-shown)~label[for="jurusan"] {
            padding: 1px 8px;
            transform: translateY(-50%) scale(0.9);
        }
    }

    @media screen and (min-width: 320px) and (max-width: 408px) {
        .floating-label label[for="jurusan"] {
            padding: 9px 8px;
        }

        .floating-label label[for="jurusan"] svg {
            margin-top: 0;
        }

        .floating-label input:focus~label[for="jurusan"],
        .floating-label input:not(:placeholder-shown)~label[for="jurusan"] {
            padding: 1px 8px;
            transform: translateY(-50%) scale(0.9);
        }
    }
</style>
@endsection

@include('partials.sidebar')
@section('content')
<div class="container container-registration">

    <div class="title d-flex justify-content-center">REGISTRATION</div>

    <div class="form-content">

        <form method="POST" action="{{ route('storeRegistration') }}" enctype="multipart/form-data" id="registrationForm">
            @csrf

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" placeholder=" " value="{{ old('asalSekolah') }}" required>
                        <label for="asalSekolah" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-school">
                                <path d="M14 22v-4a2 2 0 1 0-4 0v4" />
                                <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2" />
                                <path d="M18 5v17" />
                                <path d="m4 6 8-4 8 4" />
                                <path d="M6 5v17" />
                                <circle cx="12" cy="9" r="2" />
                            </svg>
                            Asal Sekolah</label>
                    </div>
                    @error('asalSekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" id="kontakSekolah" name="kontakSekolah" class="form-control @error('kontakSekolah') is-invalid @enderror" placeholder="" value="{{ old('kontakSekolah') }}" required>
                        <label for="kontakSekolah" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <circle cx="12" cy="10" r="2" />
                                <line x1="8" x2="8" y1="2" y2="4" />
                                <line x1="16" x2="16" y1="2" y2="4" />
                            </svg>
                            Kontak Sekolah (Ex: Email, No.Telp)
                        </label>
                    </div>

                    @error('kontakSekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" placeholder="" value="{{ old('kelas') }}" required>
                        <label for="kelas" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-university">
                                <circle cx="12" cy="10" r="1" />
                                <path d="M22 20V8h-4l-6-4-6 4H2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2" />
                                <path d="M6 17v.01" />
                                <path d="M6 13v.01" />
                                <path d="M18 17v.01" />
                                <path d="M18 13v.01" />
                                <path d="M14 22v-5a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v5" />
                            </svg>
                            Kelas
                        </label>

                    </div>

                    @error('kelas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="" value="{{ old('jurusan') }}" required>
                        <label for="jurusan" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap">
                                <path d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z" />
                                <path d="M22 10v6" />
                                <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5" />
                            </svg>
                            Jurusan (IPA/IPS/BAHASA)</label>
                    </div>
                    @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('usernameKelompok') is-invalid @enderror" id="usernameKelompok" name="usernameKelompok" placeholder="" value="{{ old('usernameKelompok') }}" required>
                        <label for="usernameKelompok" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
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
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('kontakPerwakilan') is-invalid @enderror" id="kontakPerwakilan" name="kontakPerwakilan" placeholder="" value="{{ old('kontakPerwakilan') }}" required>
                        <label for="kontakPerwakilan" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <circle cx="12" cy="10" r="2" />
                                <line x1="8" x2="8" y1="2" y2="4" />
                                <line x1="16" x2="16" y1="2" y2="4" />
                            </svg>
                            Kontak Perwakilan Kelompok
                        </label>
                    </div>

                    @error('kontakPerwakilan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="password" id="inputPassword5" class="form-control @error('passPeserta') is-invalid @enderror" name="passPeserta" aria-describedby="passwordHelpBlock" placeholder="" value="{{ old('passPeserta') }}" required>
                        <label for="inputPassword5" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            Password
                        </label>
                    </div>
                    @error('passPeserta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not
                        contain spaces, special characters, or emoji.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="password" id="confirmPass" class="form-control @error('confirmPass') is-invalid @enderror" name="confirmPass" aria-describedby="passwordHelpBlock" placeholder="" value="{{ old('confirmPass') }}" required>
                        <label for="confirmPass" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-keyhole">
                                <circle cx="12" cy="16" r="1" />
                                <rect x="3" y="10" width="18" height="12" rx="2" />
                                <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                            </svg>
                            Confirm Password
                        </label>
                    </div>
                </div>
            </div>

            <div id="confirmPasswordError" class="invalid-feedback" style="display: none;">Password
                confirmation doesn't match</div>
            @error('confirmPass')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if (session()->has('password_not_same'))
            <div class="invalid-feedback">Password confirmation doesn't match</div>
            @endif
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
                    <div class="floating-label">
                        <input type="text" class="form-control @error('namaKetua') is-invalid @enderror" id="namaKetua" name="namaKetua" placeholder="" value="{{ old('namaKetua') }}" required>
                        <label for="namaKetua" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Nama Ketua (Member 1)
                        </label>
                    </div>
                    @error('namaKetua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="email" class="form-control @error('emailKetua') is-invalid @enderror" id="emailKetua" name="emailKetua" placeholder="" value="{{ old('emailKetua') }}" required>
                        <label for="emailKetua" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-at-sign">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                            Email Ketua
                        </label>
                    </div>
                    @error('emailKetua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="row">
                <div class="mb-3">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('kerabatSatu') is-invalid @enderror" id="kerabatSatu" name="kerabatSatu" placeholder="" value="{{ old('kerabatSatu') }}" required>
                        <label for="kerabatSatu" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <circle cx="12" cy="10" r="2" />
                                <line x1="8" x2="8" y1="2" y2="4" />
                                <line x1="16" x2="16" y1="2" y2="4" />
                            </svg>
                            Kontak kerabat member 1 </label>
                    </div>
                    @error('kerabatSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="namaKedua" name="namaKedua" class="form-control @error('namaKedua') is-invalid @enderror" placeholder="" value="{{ old('namaKedua') }}" required>
                        <label for="namaKedua" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Nama Member 2
                        </label>
                    </div>
                    @error('namaKedua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="kerabatDua" name="kerabatDua" class="form-control @error('kerabatDua') is-invalid @enderror" placeholder="" value="{{ old('kerabatDua') }}" required>
                        <label for="kerabatDua" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <circle cx="12" cy="10" r="2" />
                                <line x1="8" x2="8" y1="2" y2="4" />
                                <line x1="16" x2="16" y1="2" y2="4" />
                            </svg>
                            Kontak Kerabat Member 2
                        </label>
                    </div>
                    @error('kerabatDua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="namaKetiga" name="namaKetiga" class="form-control @error('namaKetiga') is-invalid @enderror" placeholder="" value="{{ old('namaKetiga') }}" required>
                        <label for="namaKetiga" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Nama Member 3
                        </label>
                    </div>
                    @error('namaKetiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="kerabatTiga" name="kerabatTiga" class="form-control @error('kerabatTiga') is-invalid @enderror" placeholder="" value="{{ old('kerabatTiga') }}" required>
                        <label for="kerabatTiga" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                <rect width="18" height="18" x="3" y="4" rx="2" />
                                <circle cx="12" cy="10" r="2" />
                                <line x1="8" x2="8" y1="2" y2="4" />
                                <line x1="16" x2="16" y1="2" y2="4" />
                            </svg>
                            Kontak Kerabat Member 3
                        </label>
                    </div>
                    @error('kerabatTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="jenisKonsumsi" class="form-label label-konsumsi">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils">
                            <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                            <path d="M7 2v20" />
                            <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                        </svg>Jenis Konsumsi</label>
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

                <div class="mb-3 col-xl-6">
                    <label for="alergi" class="form-label alergi-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase-medical">
                            <path d="M12 11v4" />
                            <path d="M14 13h-4" />
                            <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                            <path d="M18 6v14" />
                            <path d="M6 6v14" />
                            <rect width="20" height="14" x="2" y="6" rx="2" />
                        </svg>Alergi anggota
                    </label>
                    <input type="text" class="input-alergi form-control @error('alergi') is-invalid @enderror" id="alergi" name="alergi" placeholder="Jika tidak ada, isi dengan '-'" value="{{ old('alergi') }}" required style="color: white;">
                    @error('alergi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <label for="buktiTransaksi" class="form-label bukti-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dollar-sign">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                            <path d="M12 18V6" />
                        </svg>

                        Bukti transaksi</label>
                    <input class="form-control input-transaksi @error('buktiTransaksi') is-invalid @enderror" type="file" name="buktiTransaksi" required>
                    @error('buktiTransaksi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" id="btn-submit" class="submit-button btn btn-primary btn-lg mt-2">SUBMIT</button>
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