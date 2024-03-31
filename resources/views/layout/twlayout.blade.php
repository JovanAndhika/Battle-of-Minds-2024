<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- SweetAlerts2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ScrollReveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    {{-- GSAP --}}
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" /> --}}
    <link rel="stylesheet" href="css/sidebar.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geologica&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Rowdies&display=swap');
    </style>

    @yield('head')
</head>

<body class="z-[-10] body before">

    @include('partials.sidebar')

    @yield('content')



    @yield('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/regl/2.0.0/regl.min.js"></script>
    <script src="js/footer.js"></script>

    {{-- Tailwind --}}

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
