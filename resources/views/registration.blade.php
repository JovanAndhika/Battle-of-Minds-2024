@extends('layout.mainlayout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            font-family: 'Orbitron', sans-serif;
            letter-spacing: 0.15rem;
        }

        body {
            color: white;
            min-height: 100vh;
            /* background: linear-gradient(180deg, rgb(26, 0, 36) 0%, rgb(63, 9, 121) 49%, rgb(96, 10, 255) 100%); */
            background: url(asset/bg-bom-main.png);
            background-attachment: fixed;
            background-position: center 93%;
        }

        .body2 {
            /* backdrop-filter: brightness(80%);
            -webkit-backdrop-filter: brightness(80%);
            -moz-backdrop-filter: brightness(80%); */
        }

        .container-registration {
            margin: 4rem 0;
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
            -webkit-text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #8048e0,
                0 0 73px #5f48e0;
            -moz-text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #8048e0,
                0 0 73px #5f48e0;
        }

        .form-content {
            background: rgb(150, 150, 150, 0.2);
            backdrop-filter: blur(20px) !important;
            border: 4px solid white;
            padding: 30px;
            box-shadow: 0px 0px 10px 2px #ffffff;
            -webkit-box-shadow: 0px 0px 10px 2px #ffffff;
            -moz-box-shadow: 0px 0px 10px 2px #ffffff;

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


        @media screen and (min-width: 320px) and (max-width: 381px) {

            .floating-label label[for="emailPerwakilan"],
            label[for="angkatanDua"],
            label[for="angkatanTiga"] {
                padding: 9px 8px;
            }

            .floating-label label[for="emailPerwakilan"] svg,
            label[for="angkatanDua"] svg,
            label[for="angkatanTiga"] svg {
                margin-top: 0;
            }

            .floating-label input:focus~label[for="emailPerwakilan"],
            input:focus~label[for="angkatanDua"],
            input:focus~label[for="angkatanTiga"],
            .floating-label input:not(:placeholder-shown)~label[for="emailPerwakilan"],
            input:not(:placeholder-shown)~label[for="angkatanDua"],
            input:not(:placeholder-shown)~label[for="angkatanTiga"] {
                padding: 1px 8px;
                transform: translateY(-50%) scale(0.9);
            }
        }

        @media screen and (min-width: 320px) and (max-width: 419px) {

            label[for="kontakDua"],
            label[for="kontakTiga"] {
                padding: 9px 8px;
            }

            label[for="kontakDua"] svg,
            label[for="kontakTiga"] svg {
                margin-top: 0;
            }

            input:focus~label[for="kontakDua"],
            input:focus~label[for="kontakTiga"],
            input:not(:placeholder-shown)~label[for="kontakDua"],
            input:not(:placeholder-shown)~label[for="kontakTiga"] {
                padding: 1px 8px;
                transform: translateY(-50%) scale(0.9);
            }
        }

        @media screen and (min-width: 320px) and (max-width: 413px) {

            label[for="kontakSatu"] {
                padding: 9px 8px;
            }

            label[for="kontakSatu"] svg {
                margin-top: 0;
            }

            input:focus~label[for="kontakSatu"],
            input:not(:placeholder-shown)~label[for="kontakSatu"] {
                padding: 1px 8px;
                transform: translateY(-50%) scale(0.9);
            }
        }

        .regist-section {
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>
    <link rel="stylesheet" href="css/sidebarRegister.css">
@endsection

@section('content')
    <div class="body2">
        <section class="regist-section">
            <div class="container container-registration">
                <div class="title d-flex justify-content-center">
                    REGISTRATION
                </div>
                <div class="form-content">
                    <form method="POST" action="{{ route('storeRegistration') }}" enctype="multipart/form-data"
                        id="registration-form" class="registration-form">
                        @csrf

                        <div class="form-section">
                            <div class="row">
                                <div class="mb-3 col-xl-full">
                                    <div class="floating-label">
                                        <input type="text" class="form-control" id="asalSekolah" name="asalSekolah"
                                            placeholder=" " value="{{ old('asalSekolah') }}" required>
                                        <label for="asalSekolah" class="form-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-school">
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
                                        <input type="text"
                                            class="form-control @error('namaKelompok') is-invalid @enderror"
                                            id="namaKelompok" name="namaKelompok" placeholder=""
                                            value="{{ old('namaKelompok') }}" required>
                                        <label for="namaKelompok" class="form-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user">
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
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            aria-describedby="passwordHelpBlock" placeholder=""
                                            value="{{ old('password') }}" required>
                                        <label for="password" class="form-label">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-lock">
                                                <rect width="18" height="11" x="3" y="11" rx="2"
                                                    ry="2" />
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                            </svg>
                                            Password
                                        </label>
                                    </div>
                                    @error('password')
                                        <label class="invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                                <div id="password-length" class="invalid-feedback mb-1"
                                    style="display: none; margin-top: 1em;">Password
                                    length doesn't match</div>
                                <div id="passwordHelpBlock" class="form-text">
                                    Your password must be 8-20 characters long, contain letters and numbers, and must not
                                    contain spaces, special characters, or emoji.
                                </div>
                                <script>
                                    document.getElementById("password").addEventListener("keyup", function() {
                                        let passLength = document.getElementById("password").value.length;
                                        let passwordError = document.getElementById("password-length");
                                        if (passLength >= 8 && passLength <= 20) {
                                            passwordError.style.display = "none";
                                        } else {
                                            passwordError.style.display = "block";
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-full">
                                <div class="floating-label">
                                    <input type="password" id="confirmPass"
                                        class="form-control @error('confirmPass') is-invalid @enderror" name="confirmPass"
                                        aria-describedby="passwordHelpBlock" placeholder=""
                                        value="{{ old('confirmPass') }}" required>
                                    <label for="confirmPass" class="form-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-lock-keyhole">
                                            <circle cx="12" cy="16" r="1" />
                                            <rect x="3" y="10" width="18" height="12" rx="2" />
                                            <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                                        </svg>
                                        Confirm Password
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="confirmPasswordError" class="invalid-feedback mb-3"
                            style="display: none; margin-top: -1em;">Password
                            confirmation doesn't match</div>
                        @error('confirmPass')
                            <div class="" style="margin-top: -1%;">{{ $message }}</div>
                        @enderror
                        @if (session()->has('password_not_same'))
                            <div class="" style="margin-top: -1%;">Password confirmation doesn't match</div>
                        @endif
                        <script>
                            document.getElementById("confirmPass").addEventListener("keyup", function() {
                                var password = document.getElementById("password").value;
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
                                <label class="form-label bukti-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-circle-dollar-sign">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                        <path d="M12 18V6" />
                                    </svg>
                                    Bukti transfer commitment fee Rp200.001 (wajib menambahkan kode angka 1 pada akhir
                                    nominal pembayaran). Rekening BCA 2981104724 a.n. Marcelinus Anthony Teguh format .jpg/.png
                                </label>
                                <input class="form-control input-transaksi @error('buktiTransaksi') is-invalid @enderror"
                                    type="file" name="buktiTransaksi" required>
                                @error('buktiTransaksi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="form-section">
                    <div class="row">
                        <div class="mb-3 col-xl-full">
                            <div class="floating-label">
                                <input type="email" class="form-control @error('emailPerwakilan') is-invalid @enderror"
                                    id="emailPerwakilan" name="emailPerwakilan" placeholder=""
                                    value="{{ old('emailPerwakilan') }}" required>
                                <label for="emailPerwakilan" class="form-label" id="label-email">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                        <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <circle cx="12" cy="10" r="2" />
                                        <line x1="8" x2="8" y1="2" y2="4" />
                                        <line x1="16" x2="16" y1="2" y2="4" />
                                    </svg>
                                    Email Perwakilan Kelompok
                                </label>
                            </div>
                            @error('emailPerwakilan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 nama-ketua-container">
                            <div class="floating-label">
                                <input type="text" class="form-control @error('namaSatu') is-invalid @enderror"
                                    id="namaSatu" name="namaSatu" placeholder="" value="{{ old('namaSatu') }}"
                                    required>
                                <label for="namaSatu" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
                                        <path d="M18 21a8 8 0 0 0-16 0" />
                                        <circle cx="10" cy="8" r="5" />
                                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                                    </svg>
                                    Nama Member 1 (Ketua)
                                </label>
                            </div>
                            @error('namaSatu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input type="text" class="form-control @error('kontakSatu') is-invalid @enderror"
                                    id="kontakSatu" name="kontakSatu" placeholder="" value="{{ old('kontakSatu') }}"
                                    required>
                                <label for="kontakSatu" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                        <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <circle cx="12" cy="10" r="2" />
                                        <line x1="8" x2="8" y1="2" y2="4" />
                                        <line x1="16" x2="16" y1="2" y2="4" />
                                    </svg>
                                    Kontak member 1 (WA & id Line)
                                </label>
                            </div>
                            @error('kontakSatu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-xl-full">
                            <label class="form-label bukti-label" for="kartuPelajarSatu">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>
                                Scan kartu pelajar member 1 (format .jpg/.png maks 1mb)</label>
                            <input class="form-control input-transaksi @error('kartuPelajarSatu') is-invalid @enderror"
                                type="file" id="kartuPelajarSatu" name="kartuPelajarSatu" required>
                            @error('kartuPelajarSatu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 nama2-container">
                            <div class="floating-label">
                                <input type="text" id="namaDua" name="namaDua"
                                    class="form-control @error('namaDua') is-invalid @enderror" placeholder=""
                                    value="{{ old('namaDua') }}" required>
                                <label for="namaDua" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
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
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input type="text" class="form-control @error('kontakDua') is-invalid @enderror"
                                    id="kontakDua" name="kontakDua" placeholder="" value="{{ old('kontakDua') }}"
                                    required>
                                <label for="kontakDua" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                        <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <circle cx="12" cy="10" r="2" />
                                        <line x1="8" x2="8" y1="2" y2="4" />
                                        <line x1="16" x2="16" y1="2" y2="4" />
                                    </svg>
                                    Kontak member 2 (WA & id Line)
                                </label>
                            </div>
                            @error('kontakDua')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-xl-full">
                            <label class="form-label bukti-label" for="kartuPelajarDua">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>
                                Scan kartu pelajar member 2 (format .jpg/.png maks 1mb)</label>
                            <input class="form-control input-transaksi @error('kartuPelajarDua') is-invalid @enderror"
                                type="file" id="kartuPelajarDua" name="kartuPelajarDua" required>
                            @error('kartuPelajarDua')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 nama3-container">
                            <div class="floating-label">
                                <input type="text" id="namaTiga" name="namaTiga"
                                    class="form-control @error('namaTiga') is-invalid @enderror" placeholder=""
                                    value="{{ old('namaTiga') }}" required>
                                <label for="namaTiga" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round">
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
                        <div class="col-md-6">
                            <div class="floating-label">
                                <input type="text" class="form-control @error('kontakTiga') is-invalid @enderror"
                                    id="kontakTiga" name="kontakTiga" placeholder="" value="{{ old('kontakTiga') }}"
                                    required>
                                <label for="kontakTiga" class="form-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact">
                                        <path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <circle cx="12" cy="10" r="2" />
                                        <line x1="8" x2="8" y1="2" y2="4" />
                                        <line x1="16" x2="16" y1="2" y2="4" />
                                    </svg>
                                    Kontak member 3 (WA & id Line)
                                </label>
                            </div>
                            @error('kontakTiga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-xl-full">
                            <label class="form-label bukti-label" for="kartuPelajarTiga">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-credit-card">
                                    <rect width="20" height="14" x="2" y="5" rx="2" />
                                    <line x1="2" x2="22" y1="10" y2="10" />
                                </svg>
                                Scan kartu pelajar member 3 (format .jpg/.png maks 1mb)</label>
                            <input class="form-control input-transaksi @error('kartuPelajarTiga') is-invalid @enderror"
                                type="file" name="kartuPelajarTiga" id="kartuPelajarTiga" required>
                            @error('kartuPelajarTiga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-navigation">
                    <button type="button" class="previous btn btn-info mb-3 float-left">Prev</button>
                    <button type="button" class="next btn btn-info mb-3 float-right" style="float: right;">Next</button>
                    <button type="submit" id="btn-submit"
                        class="btn btn-primary float-right submit-button">SUBMIT</button>
                </div>
                </form>
            </div>
    </div>
    </section>
    </div>
    <!-- MULTIPAGE FORM -->
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: inherit;
        }

        .next {
            width: 150px;
            margin-top: -15px;
        }

        .previous {
            width: 150px;
            margin-top: -15px;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
@endsection

@section('script')
    <script>
        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type=submit]').toggle(atTheEnd);
            }


            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }


            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });


            $('.form-navigation .next').click(function() {
                $('.registration-form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                })
            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);
        });



        document.getElementById("registration-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Menghentikan aksi bawaan formulir
            if ($(this).parsley().isValid()) {
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
            };
        });
    </script>
@endsection
