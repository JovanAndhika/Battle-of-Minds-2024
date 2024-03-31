@extends('layout.mainlayout')

@section('head')
    <link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            color: white;
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 49%, rgba(0, 212, 255, 1) 100%);
            background-attachment: fixed;
            background-position: center;
            font-weight: 800;
        }

        .form-text {
            color: white
        }

        .title {
            font-size: 45px;
            font-weight: bold;
            margin: 20px;
            padding: 20px;
            text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #48abe0,
                0 0 73px #48abe0;
        }

        .form-content {
            background: rgb(255, 255, 255, 0.2);
            border: 4px solid white;
            padding: 30px;
            box-shadow: 2px 10px 10px 2px #888888;
        }

        .form-label {
            display: flex;
        }

        .form-label svg {
            margin-right: 10px;
        }


     

        /* submit button */
        .btn {
            background-color: #0070BB;
            width: 100%;
            font-weight: bold;

        }

        .btn:hover {
            background-color: #318CE7;
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
            border: 3px solid #ccc;
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
        ::-webkit-file-upload-button{
            height: 50px !important;
            padding: 19px 15px 15px 27px !important;
            
        }

        .input-transaksi{
            padding: 0 !important;
            height: 50px !important;
            font-weight: bold;
        }

        select#jenisKonsumsi,  
        #alergi::placeholder {
            color: white;
            font-size: 16px;
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
            height: 37px;
            z-index: 0;
            transform-origin: left top;
        }

        .floating-label input:focus {
            color: white;
        }

        .floating-label input:focus~label,
        .floating-label input:not(:placeholder-shown)~label {
            font-size: 17px;
            padding-top: 5px;
            box-shadow: none;
            border-radius: 10px;
            color: black;
            transform: translateY(-50%) scale(0.8);
            transition: 0.4s ease;
            background: white;
        } 

            /* responsive */
            @media screen and (max-width: 768px) {
            .row, #namaKetua, #namaKetiga {
                margin-bottom: 15px;
            }

            .title{
                font-size: 35px;
            }

            select#jenisKonsumsi,  
            #alergi::placeholder {
                font-size: 12px;
            }

            .floating-label input:focus~label,
            .floating-label input:not(:placeholder-shown)~label {
                left: 10px;
                font-size: 12px;
                padding-top: 14px;
                
            } 

            .floating-label input:focus~label[for="kontakSekolah"],
            .floating-label input:not(:placeholder-shown)~label[for="kontakSekolah"] {
                padding-top: 15px;

            }

            .floating-label input:focus~label[for="kontakSekolah"] svg,
            .floating-label input:not(:placeholder-shown)~label[for="kontakSekolah"] svg {
                margin-top: -5px; 
            }

            label.form-label{
                left: 0px;
                top: 5px;
                height: 45px;
                font-size: 12px;  
            }

            label.form-label[for="kontakSekolah"] {
                top: -5px;
            }


            svg.lucide.lucide-contact{
                margin-top: -5px;

            }
       
 

 
            .form-label svg {
                margin-right: 10px;
                margin-top: -5px;
            }

   
            #alergi.form-control{
                position: relative;
                top: -5px;  
                padding: 11px;  
            }

            #jenisKonsumsi.form-select{
                position: relative;
                top: -15px;   
            }

            .form-control.input-transaksi{
                position: relative;
                top: -20px;  
                padding: 12px; 
            }

            #file-upload-button,
            ::-webkit-file-upload-button{
                height: 46px !important;
            }

            .input-transaksi{
                font-size: 12px;
                height: 46px !important;
            }

       
            @media screen and (min-width: 768px) and (max-width: 1200px) {
                select#jenisKonsumsi,  
                #alergi::placeholder {
                font-size: 14px;
                }

            .floating-label input:focus~label,
            .floating-label input:not(:placeholder-shown)~label {
                font-size: 14px;                
            } 

            .floating-label input:focus~label[for="kontakSekolah"],
            .floating-label input:not(:placeholder-shown)~label[for="kontakSekolah"] {
                padding-top: 5px;

            }
        
            label.form-label{
                font-size: 14px;  
                
            }

            label.form-label[for="alergi"] {
                position: relative;
                top: -15px;
            }

      


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
                        <div class="floating-label">
                            <input type="text" id="kontakSekolah" name="kontakSekolah"
                                class="form-control @error('kontakSekolah') is-invalid @enderror"
                                placeholder="" value="{{ old('kontakSekolah') }}" required>
                            <label for="kontakSekolah" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-contact">
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
                        <div class="floating-label">
                            <input type="password" id="inputPassword5"
                                class="form-control @error('passPeserta') is-invalid @enderror" name="passPeserta"
                                aria-describedby="passwordHelpBlock" placeholder=""
                                value="{{ old('passPeserta') }}" required>
                            <label for="inputPassword5" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                                    <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                                Password
                            </label>
                            @error('passPeserta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="passwordHelpBlock" class="form-text">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not
                                contain spaces, special characters, or emoji.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <div class="floating-label">
                            <input type="password" id="inputConfirmPassword5" class="form-control"
                                name="passConfirmPeserta" aria-describedby="passwordHelpBlock"
                                placeholder="" value="{{ old('passConfirmPeserta') }}" required>
                            <label for="inputConfirmPassword5" class="form-label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock-keyhole">
                                    <circle cx="12" cy="16" r="1" />
                                    <rect x="3" y="10" width="18" height="12" rx="2" />
                                    <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                                </svg>
                                Confirm Password</label>
                        </div>

                        <div id="confirmPasswordError" class="invalid-feedback" style="display: none;">Password is not
                            the same</div>
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
                    <div class="floating-label">
                    <input type="text" class="form-control @error('namaKetua') is-invalid @enderror" id="namaKetua" name="namaKetua" placeholder="" value="{{ old('namaKetua') }}" required>
                    <label for="namaKetua" class="form-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-at-sign"><circle cx="12" cy="12" r="4"/><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"/></svg>
                            Email Ketua
                        </label>
                    </div>
                    @error('emailKetua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="namaKedua" name="namaKedua" class="form-control @error('namaKedua') is-invalid @enderror" placeholder="" value="{{ old('namaKedua') }}" required>
                        <label for="namaKedua" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
                        Nama Member 2
                        </label>
                    </div>
                    @error('namaKedua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="floating-label">
                        <input type="text" id="namaKetiga" name="namaKetiga" class="form-control @error('namaKetiga') is-invalid @enderror" placeholder="" value="{{ old('namaKetiga') }}" required>
                        <label for="namaKetiga" class="form-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round"><path d="M18 21a8 8 0 0 0-16 0"/><circle cx="10" cy="8" r="5"/><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/></svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact"><path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2"/><rect width="18" height="18" x="3" y="4" rx="2"/><circle cx="12" cy="10" r="2"/><line x1="8" x2="8" y1="2" y2="4"/><line x1="16" x2="16" y1="2" y2="4"/></svg>
                            Kontak Kerabat Member 3 
                        </label>
                    </div>
                    @error('kerabatTiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="jenisKonsumsi" class="form-label mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-utensils">
                                <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                                <path d="M7 2v20" />
                                <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                            </svg>Jenis Konsumsi</label>
                        <select class="form-select @error('jenisKonsumsi') is-invalid @enderror" id="jenisKonsumsi"
                            name="jenisKonsumsi" aria-label="Default select example" required>
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
                        <label for="alergi" class="form-label" > <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-briefcase-medical">
                                <path d="M12 11v4" />
                                <path d="M14 13h-4" />
                                <path d="M16 6V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" />
                                <path d="M18 6v14" />
                                <path d="M6 6v14" />
                                <rect width="20" height="14" x="2" y="6" rx="2" />
                            </svg>Apakah ada anggota yang mempunyai alergi?</label>
                        <input type="text" class="form-control @error('alergi') is-invalid @enderror" id="alergi"
                            name="alergi" placeholder="Jika tidak ada, bisa inputkan '-'" value="{{ old('alergi') }}"
                            required style="color: white;">
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

                <button type="submit" class="btn btn-primary btn-lg mt-2">SUBMIT</button>
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
