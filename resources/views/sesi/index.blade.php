<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsEric/login.css') }}">
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- SweetAlerts2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="css/sidebar.css">
    <title>LOGIN BOM</title>

    <style>
        body {
            background: url(asset/bg-bom-main.png);
            background-position: center 0%;
            background-size: cover;
        }

        .login {
            padding: 0;
        }

        .login-button {
            border-radius: 40px;
            width: 200px;
        }

        .maskot {
            position: absolute;
            width: 500px;
            height: auto;
            /* padding-left: 6rem; */
            border-top-left-radius: 40px;
            animation: fadeUpDown 2.5s forwards;
        }


        @keyframes fadeUpDown {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            50% {
                opacity: 1;
                transform: translateY(0);
            }

            70% {
                opacity: 1;
                transform: translateY(0);
            }

            100% {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        @keyframes fadeLeftDown {
            0% {
                opacity: 0;
                /* Awal dengan keadaan tidak terlihat */
                transform: translateY(20px);
                /* Mulai dari posisi 20px di bawah */
            }

            10% {
                opacity: 0;
                transform: translateX(-20px);
            }

            50% {
                opacity: 1;
                transform: translateX(0);
            }

            70% {
                opacity: 1;
                transform: translateX(0);
            }

            100% {
                opacity: 0;
                /* Akhir dengan keadaan tidak terlihat */
                transform: translateY(-20px);
                /* Berakhir 20px di atas */
            }
        }

        p {
            margin: 0;
            padding: 12px
        }

        .speech-bubble {
            width: 200px;
            height: auto;
            margin: 0 0 250px 450px;
            position: absolute;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background-color: white;
            animation: fadeLeftDown 2.5s forwards;

        }

        .speech-bubble:after {
            content: "";
            position: absolute;
            left: 5px;
            top: 50px;
            border-top: 30px solid transparent;
            border-right: 21px solid white;
            border-bottom: 0px solid transparent;
            margin: -25px;
        }

        @media (max-width: 768px) {

            #nrp,
            #password {
                font-size: 0.8rem;
            }

            .maskot {
                width: 300px;
            }

            .speech-bubble {
                width: 200px;
                height: auto;
                margin: 0 0 400px 0;
                position: absolute;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
                border-radius: 10px;
                background-color: white;
                animation: fadeLeftDown 2.5s forwards;

            }

            .speech-bubble:after {
                content: "";
                position: absolute;
                left: 35px;
                z-index: -1;
                top: 60px;
                border-top: 30px solid transparent;
                border-right: 21px solid white;
                border-right: 21px solid white;
                border-bottom: 30px solid transparent;
                margin: -25px;
            }

            .login-button {
                border-radius: 20px;
                width: 150px;
                font-size: 0.85rem;
            }
        }

        .link-forgot {
            text-decoration: none;
        }

        .link-forgot:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    @include('partials.sidebar')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil !',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Warning !',
                text: '{{ session('error') }}'
            });
        </script>
    @endif
    <video src="{{ asset('asset/waving.webm') }}" autoplay muted class="maskot"></video>
    {{-- <img src="{{ asset('asset/waving.png') }}" alt="faq-maskot"
                class="maskot"> --}}
    <div class='speech-bubble'>
        <p>Silahkan login terlebih dahulu</p>
    </div>

    <div class="box  border border-blue">
        <form action="{{ route('session.login') }}" method="post">
            @csrf
            <div class="row center">
                <div class=" col-lg-5 m-0 text-center">
                    <img src="{{ asset('asset/logo-main.png') }}" class="text-center logo-bom" alt="">
                </div>

                <div class="col-lg-5 m-0 text-center">

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('not_validated'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Login Failed',
                                text: '{{ session('not_validated') }}',
                            })
                        </script>
                    @endif
                    <div>

                    </div>
                    <div class="col-12 input-box text-center" id="usernameBox">
                        <input type="text" name="namaKelompok" id="nrp" required placeholder="Nama Kelompok"
                            value="{{ Session::get('namaKelompok') }}" autocomplete="off">
                    </div>

                    <div class="col-12 input-box text-center mb-4" id="passwordBox">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <a href="{{ route('session.forget') }}" class="link-forgot">Forgot Password? Click Here</a>
                    <div class="col-12 text-center my-4 px-4 py-1">
                        <button type="submit" class="button border login-button" style="color: white;">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
