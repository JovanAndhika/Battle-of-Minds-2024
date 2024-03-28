@extends('layout.mainlayout')

@section('head')
<link rel="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        
        body{
            color: white;
            min-height: 100vh;
            background: linear-gradient(180deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 49%, rgba(0, 212, 255, 1) 100%);
            background-attachment: fixed;
            background-position: center;
            backdrop-filter:blur(10px);
            font-weight: 800;
        }

        .form-text{
            color: white
        }

        .title {
            font-size: 43px;
            font-weight: bold;
            margin: 20px;
            text-shadow:
            0 0 4px #fff,
            0 0 10px #fff,
            0 0 38px #48abe0,
            0 0 73px #48abe0;
        }

        .form-content {
            background: rgb(255,255,255,0.2) ;
            border: 4px solid white;
            padding: 30px;
            box-shadow: 2px 10px 10px 2px #888888;
        }

         /*logo */
         i {
            font-size: 22px; 
            margin-right: 5px;
        }

        .btn{  
            background-color:#0070BB;
            width: 100%;
            font-weight: bold;
    
        }

        .btn:hover{
            background-color:#318CE7;
            
        }

        .row {
            margin-bottom: 20px; 
        }

        /* floating labels */
       .form-floating label {
            position: absolute;    
            outline: none;
            padding: 0 30 px;        
            height: 35px;           
            transition: 0.4s ease;
            z-index: 10;  

        }

        .form-floating input:focus ~ label{
            background: white;
        

        }

        .form-floating input:focus ~ label,
        .form-floating input:not(:placeholder-shown) ~ label {
            top: -12px;
            left: 5px;
            font-size: 18px;
            padding-top: 5px;
            box-shadow: none;
            border-radius: 5px;   
            color: black;                  
            transform: translateY(-50%) scale(0.8); 
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
            padding: 10px;
            color: white;
        }

        input[type="file"] {
            background:transparent;
            border: 3px solid #ccc; 
            border-radius: 5px;    
            color: white; 
        }

        select#jenisKonsumsi {
            color: #72A0C1; 
            font-size: 16px; 
            font-weight: bold;
        }

 

        /* input field focus*/
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

       
    </style>
@endsection

@include('partials.navbarshort')
@section('content')
<div class="container container-registration">
    
    <div class="title d-flex justify-content-center">REGISTRATION</div>

    <div class="form-content">

        <form method="POST" action="{{ route('storeRegistration') }}" enctype="multipart/form-data" id="registrationForm">
            @csrf

            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="asalSekolah" name="asalSekolah" placeholder=" " value="{{ old('asalSekolah') }}" required>
                        <label for="asalSekolah">
                            <i class="fas fa-school"></i>
                            Asal Sekolah</label>
                    </div>
                    @error('asalSekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <div class="form-floating">
                        <input type="text" id="kontakSekolah" name="kontakSekolah" class="form-control @error('kontakSekolah') is-invalid @enderror" placeholder="Masukkan kontak sekolah" value="{{ old('kontakSekolah') }}" required>
                        <label for="kontakSekolah" class="form-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-contact"><path d="M17 18a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2"/><rect width="18" height="18" x="3" y="4" rx="2"/><circle cx="12" cy="10" r="2"/><line x1="8" x2="8" y1="2" y2="4"/><line x1="16" x2="16" y1="2" y2="4"/></svg>
                            Kontak Sekolah (ex: email, no.telp)
                        </label>
                    </div>
                   
                    @error('kontakSekolah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('usernameKelompok') is-invalid @enderror" id="usernameKelompok" name="usernameKelompok" placeholder="Masukkan username kelompok" value="{{ old('usernameKelompok') }}" required>
                    <label for="usernameKelompok" class="form-label">
                    <i class="fas fa-user"></i>                       
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
                    <div class="form-floating">
                        <input type="password" id="inputPassword5" class="form-control @error('passPeserta') is-invalid @enderror" name="passPeserta" aria-describedby="passwordHelpBlock" placeholder="Masukkan password" value="{{ old('passPeserta') }}" required>                       
                        <label for="inputPassword5" class="form-label">
                        <i class="fas fa-lock"></i>    
                        Password
                    </label>
                        @error('passPeserta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div id="passwordHelpBlock" class="form-text">
                            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                <div class="form-floating">
                    <input type="password" id="inputConfirmPassword5" class="form-control" name="passConfirmPeserta" aria-describedby="passwordHelpBlock" placeholder="Masukkan confirm password" value="{{ old('passConfirmPeserta') }}" required>
                    <label for="inputConfirmPassword5" class="form-label">
                    <i class="fas fa-lock"></i>
                        Confirm Password</label>
                </div>
               
                    <div id="confirmPasswordError" class="invalid-feedback" style="display: none;">Password is not the same</div>
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
                    <div class="form-floating">
                    <input type="text" class="form-control @error('namaKetua') is-invalid @enderror" id="namaKetua" name="namaKetua" placeholder="Masukkan nama ketua" value="{{ old('namaKetua') }}" required>
                    <label for="namaKetua">
                        <i class="fas fa-user"></i>
                        Nama Ketua (Member 1)
                        </label>
                    </div>
                    @error('namaKetua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control @error('emailKetua') is-invalid @enderror" id="emailKetua" name="emailKetua" placeholder="example@gmail.com" value="{{ old('emailKetua') }}" required>
                        <label for="emailKetua">
                            <i class="fas fa-envelope"></i>
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
                    <div class="form-floating">
                        <input type="text" id="namaKedua" name="namaKedua" class="form-control @error('namaKedua') is-invalid @enderror" placeholder="Masukkan nama member 2" value="{{ old('namaKedua') }}" required>
                        <label for="namaKedua">
                        <i class="fas fa-user"></i>
                        Nama Member 2
                        </label>
                    </div>
                    @error('namaKedua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="form-floating">
                        <input type="text" id="namaKetiga" name="namaKetiga" class="form-control @error('namaKetiga') is-invalid @enderror" placeholder="Masukkan nama member 3" value="{{ old('namaKetiga') }}" required>
                        <label for="namaKetiga">
                            <i class="fas fa-user"></i>
                            Nama Member 3
                        </label>
                    </div>
                    @error('namaKetiga')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <div class="form-floating">
                        <input type="text" id="kerabatTiga" name="kerabatTiga" class="form-control @error('kerabatTiga') is-invalid @enderror" placeholder="Masukkan kontak kerabat" value="{{ old('kerabatTiga') }}" required>
                        <label for="kerabatTiga">
                            <i class="fas fa-user"></i>
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
                <i class="fas fa-utensils"></i>
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
                <i class="fas fa-allergies"></i>
                    <label for="alergi" class="form-label">Apakah ada anggota yang mempunyai alergi?</label>
                    <input type="text" class="form-control @error('alergi') is-invalid @enderror" id="alergi" name="alergi" placeholder="Jika tidak ada, bisa inputkan '-'" value="{{ old('alergi') }}" required>
                    @error('alergi')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="buktiTransaksi" class="form-label">Bukti transaksi</label>
                    <input class="form-control @error('buktiTransaksi') is-invalid @enderror" type="file" id="buktiTransaksi" name="buktiTransaksi" required>
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