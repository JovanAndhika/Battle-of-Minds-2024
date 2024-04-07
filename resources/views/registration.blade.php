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
        grid-template-columns: 40px auto;
        user-select: none;
        margin: 0;
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
        margin-bottom: 10px;
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
            font-size: 2.4rem;
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

        .bukti-label svg,
        .alergi-label svg,
        .label-konsumsi svg {
            margin-top: -2.1px;
        }

        .nama-ketua-container,
        .nama3-container {
            height: 72.2px;
        }

    }

   
    @media screen and (min-width: 320px) and (max-width: 398px) {
        .floating-label label[for="angkatanSatu"] {
            padding: 9px 8px;
        }

        .floating-label label[for="angkatanSatu"] svg {
            margin-top: 0;
        }

        .floating-label input:focus~label[for="angkatanSatu"],
        .floating-label input:not(:placeholder-shown)~label[for="angkatanSatu"] {
            padding: 1px 8px;
            transform: translateY(-50%) scale(0.9);
        }
    }


    @media screen and (min-width: 320px) and (max-width: 413px) {
        .floating-label label[for="kontakPerwakilan"] {
            padding: 9px 8px;
        }

        .floating-label label[for="kontakPerwakilan"] svg {
            margin-top: 0;
        }

        .floating-label input:focus~label[for="kontakPerwakilan"],
        .floating-label input:not(:placeholder-shown)~label[for="kontakPerwakilan"] {
            padding: 1px 8px;
            transform: translateY(-50%) scale(0.9);
        }
    }



    @media screen and (min-width: 320px) and (max-width: 359px) {
        .floating-label label[for="namaSatu"] {
            padding: 9px 8px;
        }

        .floating-label label[for="namaSatu"] svg {
            margin-top: 0;
        }

        .floating-label input:focus~label[for="namaSatu"],
        .floating-label input:not(:placeholder-shown)~label[for="namaSatu"] {
            padding: 1px 8px;
            transform: translateY(-50%) scale(0.9);
        }
    }
</style>
<link rel="stylesheet" href="css/sidebarRegister.css">
@endsection

@include('partials.sidebar')
@section('content')
<div class="container container-registration">

    <div class="title d-flex justify-content-center">REGISTRATION</div>

    <div class="form-content">

        <form method="POST" action="{{ route('storeRegistration') }}" enctype="multipart/form-data" id="registrationForm">
            @csrf

            <div class="row">
                <div class="mb-3 col-xl-full">
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
                <div class="mb-3 col-xl-full">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('namaKelompok') is-invalid @enderror" id="namaKelompok" name="namaKelompok" placeholder="" value="{{ old('namaKelompok') }}" required>
                        <label for="namaKelompok" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Nama Kelompok
                        </label>
                        @error('namaKelompok')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-xl-full">
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
                <div class="mb-3 col-xl-full">
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
                <div class="mb-3 col-xl-full">
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


            <!-- ---------------------------------------------------------------------- -->

            <div class="row">
                <div class="mb-3 col-xl-full">
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
                            Kontak Perwakilan Kelompok (WA/id Line)
                        </label>
                    </div>

                    @error('kontakPerwakilan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-md-6 nama-ketua-container">
                    <div class="floating-label">
                        <input type="text" class="form-control @error('namaSatu') is-invalid @enderror" id="namaSatu" name="namaSatu" placeholder="" value="{{ old('namaSatu') }}" required>
                        <label for="namaSatu" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Nama Ketua (Member 1)
                        </label>
                    </div>
                    @error('namaSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="email" class="form-control @error('emailSatu') is-invalid @enderror" id="emailSatu" name="emailSatu" placeholder="" value="{{ old('emailSatu') }}" required>
                        <label for="emailSatu" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-at-sign">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                            Email Ketua
                        </label>
                    </div>
                    @error('emailSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-xl-full">
                    <div class="floating-label">
                        <input type="email" class="form-control @error('emailSatu') is-invalid @enderror" id="emailSatu" name="emailSatu" placeholder="" value="{{ old('emailSatu') }}" required>
                        <label for="emailSatu" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-at-sign">
                                <circle cx="12" cy="12" r="4" />
                                <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" />
                            </svg>
                            Email Ketua
                        </label>
                    </div>
                    @error('emailSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="jenisKonsumsiSatu" class="form-label label-konsumsi">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils">
                            <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                            <path d="M7 2v20" />
                            <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                        </svg>Jenis Konsumsi Member 1</label>
                    <select class="form-select @error('jenisKonsumsiSatu') is-invalid @enderror" id="jenisKonsumsiSatu" name="jenisKonsumsiSatu" aria-label="Default select example" required>
                        <option selected>Pilih jenis konsumsi...</option>
                        <option value="normal">Normal</option>
                        <option value="vege">Vege</option>
                        <option value="vegan">Vegan</option>
                    </select>
                    @error('jenisKonsumsiSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="alergi" class="form-label alergi-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-plus">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                            <path d="M9 12h6" />
                            <path d="M12 9v6" />
                        </svg>Alergi Member 1
                    </label>
                    <input type="text" class="input-alergi form-control @error('alergiSatu') is-invalid @enderror" id="alergiSatu" name="alergiSatu" placeholder="Jika tidak ada, isi dengan '-'" value="{{ old('alergiSatu') }}" required style="color: white;">
                    @error('alergiSatu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="namaDua" name="namaDua" class="form-control @error('namaDua') is-invalid @enderror" placeholder="" value="{{ old('namaDua') }}" required>
                        <label for="namaDua" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Nama Member 2
                        </label>
                    </div>
                    @error('namaDua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="angkatanDua" name="angkatanDua" class="form-control @error('angkatanDua') is-invalid @enderror" placeholder="" value="{{ old('angkatanDua') }}" required>
                        <label for="angkatanDua" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Angkatan Member 2 (ex. 2022)
                        </label>
                    </div>
                    @error('angkatanDua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="jenisKonsumsiDua" class="form-label label-konsumsi">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils">
                            <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                            <path d="M7 2v20" />
                            <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                        </svg>Jenis Konsumsi Member 2</label>
                    <select class="form-select @error('jenisKonsumsiDua') is-invalid @enderror" id="jenisKonsumsiDua" name="jenisKonsumsiDua" aria-label="Default select example" required>
                        <option selected>Pilih jenis konsumsi...</option>
                        <option value="normal">Normal</option>
                        <option value="vege">Vege</option>
                        <option value="vegan">Vegan</option>
                    </select>
                    @error('jenisKonsumsiDua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="alergiDua" class="form-label alergi-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-plus">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                            <path d="M9 12h6" />
                            <path d="M12 9v6" />
                        </svg>Alergi Member 2
                    </label>
                    <input type="text" class="input-alergi form-control @error('alergiDua') is-invalid @enderror" id="alergiDua" name="alergiDua" placeholder="Jika tidak ada, isi dengan '-'" value="{{ old('alergiDua') }}" required style="color: white;">
                    @error('alergiDua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>



            <div class="row">
                <div class="mb-3 col-md-6 nama3-container">
                    <div class="floating-label">
                        <input type="text" id="namaTiga" name="namaTiga" class="form-control @error('namaTiga') is-invalid @enderror" placeholder="" value="{{ old('namaTiga') }}" required>
                        <label for="namaTiga" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Nama Member 3
                        </label>
                    </div>
                    @error('namaTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="angkatanTiga" name="angkatanTiga" class="form-control @error('angkatanTiga') is-invalid @enderror" placeholder="" value="{{ old('angkatanTiga') }}" required>
                        <label for="angkatanTiga" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                <path d="M18 21a8 8 0 0 0-16 0" />
                                <circle cx="10" cy="8" r="5" />
                                <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                            </svg>
                            Angkatan Member 3 (ex. 2022)
                        </label>
                    </div>
                    @error('angkatanTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="jenisKonsumsiTiga" class="form-label label-konsumsi">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-utensils">
                            <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                            <path d="M7 2v20" />
                            <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                        </svg>Jenis Konsumsi Member 3</label>
                    <select class="form-select @error('jenisKonsumsiTiga') is-invalid @enderror" id="jenisKonsumsiTiga" name="jenisKonsumsiTiga" aria-label="Default select example" required>
                        <option selected>Pilih jenis konsumsi...</option>
                        <option value="normal">Normal</option>
                        <option value="vege">Vege</option>
                        <option value="vegan">Vegan</option>
                    </select>
                    @error('jenisKonsumsiTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="alergiTiga" class="form-label alergi-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-plus">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z" />
                            <path d="M9 12h6" />
                            <path d="M12 9v6" />
                        </svg>Alergi Member 3
                    </label>
                    <input type="text" class="input-alergi form-control @error('alergiTiga') is-invalid @enderror" id="alergiTiga" name="alergiTiga" placeholder="Jika tidak ada, isi dengan '-'" value="{{ old('alergiTiga') }}" required style="color: white;">
                    @error('alergiTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-xl-full">
                    <label for="kartuPelajar" class="form-label bukti-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-dollar-sign">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                            <path d="M12 18V6" />
                        </svg>

                        Scan kartu pelajar ketiga member</label>
                    <input class="form-control input-transaksi @error('kartuPelajar') is-invalid @enderror" type="file" name="kartuPelajar" required>
                    @error('kartuPelajar')
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