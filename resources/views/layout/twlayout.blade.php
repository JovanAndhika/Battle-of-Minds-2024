<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('asset/icon-logo-bom.png') }}">
    <title>{{ $title }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/css/tw-elements.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geologica&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rowdies&display=swap');

        ::selection {
            background-color: rgb(62, 26, 189);
            color: white;
        }

        .loader2-container {
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

        .loader2 {
            width: 100vw !important;
            height: 100vh !important;
            text-align: center;
            padding: 1em;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .swal2-confirm {
            background: rgb(46, 143, 255) !important;
        }

        .swal2-deny,
        .swal2-cancel {
            background: rgb(255, 79, 79) !important;
        }


        #loading_svg path,
        #loading_svg rect {
            fill: white;
        }
    </style>
    <script>
        $("body").css({
            "overflow-y": "hidden",
        });
        setTimeout(function() {
            $(".loader2-container").fadeOut("slow", function() {
                $("body").css({
                    "overflow-y": "auto",
                });
            });
        }, 1000);
    </script>
    @yield('head')
</head>

<body class="z-[-10] body before">
    <div class="loader2-container">
        <div class="loader2">
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
    @include('partials.sidebar')

    @yield('content')



    @yield('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/regl/2.0.0/regl.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/js/tw-elements.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
