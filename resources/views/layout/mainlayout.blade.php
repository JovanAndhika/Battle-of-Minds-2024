<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('asset/icon-logo-bom.png') }}">

    <title>{{ $title }}</title>
    <meta name="description"
        content="Battle of Minds 2024 merupakan sebuah lomba dengan bentuk kegiatan Numerical Logical Competition yang memadukan 
        konsep logika matematika dengan permainan yang seru dan menantang untuk mengasah pola pikir siswa siswi SMA/SMK. 
        Tahun ini, Battle Of Minds 2024 mengangkat tema “Exploring the Depths of Minds” yang memiliki arti seorang 
        penjelajah yang sedang mendalami pemahaman akan sesuatu. ">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- SweetAlerts2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- parsley js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geologica&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rowdies&display=swap');

        ::selection {
            background-color: rgb(62, 26, 189);
            color: white;
        }

        html {
            scroll-behavior: smooth;
        }

        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: rgb(107, 21, 125);
            border-radius: 25px;
        }

        body::-webkit-scrollbar-track {
            background: linear-gradient(125deg, rgba(120, 27, 55, 0.75), rgba(123, 48, 176, 0.75) 51%, rgba(61, 37, 84, 0.75) 100%);
        }

        .loader-container {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100vw !important;
            height: 100vh !important;
            background: linear-gradient(125deg, rgba(120, 27, 55, 1), rgba(123, 48, 176, 1) 51%, rgba(61, 37, 84, 1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1200;
        }

        .loader {
            width: 100vw !important;
            height: 100vh !important;
            text-align: center;
            padding: 1em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loading_svg path,
        #loading_svg rect {
            fill: white;
        }

        .swal2-confirm {
            background: rgb(46, 143, 255) !important;
        }

        .swal2-deny,
        .swal2-cancel {
            background: rgb(255, 79, 79) !important;
        }
    </style>
    <script>
        $("body").css({
            "overflow-y": "hidden",
        });
        setTimeout(function() {
            $(".loader-container").fadeOut("slow", function() {
                $("body").css({
                    "overflow-y": "auto",
                });
            });
        }, 1000);
    </script>
    @yield('head')
</head>

<body>
    @include('partials.sidebar')

    <div class="loader-container">
        <div class="loader">
            <svg version="1.1" id="#loading_svg" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100"
                enable-background="new 0 0 100 100" xml:space="preserve" width="130px" height="130px">
                <path fill="#fff" d="M31.6,3.5C5.9,13.6-6.6,42.7,3.5,68.4c10.1,25.7,39.2,38.3,64.9,28.1l-3.1-7.9c-21.3,8.4-45.4-2-53.8-23.3
  c-8.4-21.3,2-45.4,23.3-53.8L31.6,3.5z">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
                <path fill="#fff" d="M42.3,39.6c5.7-4.3,13.9-3.1,18.1,2.7c4.3,5.7,3.1,13.9-2.7,18.1l4.1,5.5c8.8-6.5,10.6-19,4.1-27.7
  c-6.5-8.8-19-10.6-27.7-4.1L42.3,39.6z">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="-360 50 50" repeatCount="indefinite" />
                </path>
                <path fill="#fff" d="M82,35.7C74.1,18,53.4,10.1,35.7,18S10.1,46.6,18,64.3l7.6-3.4c-6-13.5,0-29.3,13.5-35.3s29.3,0,35.3,13.5
  L82,35.7z">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="2s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
    </div>

    @yield('content')

    @yield('script')

</body>

</html>
