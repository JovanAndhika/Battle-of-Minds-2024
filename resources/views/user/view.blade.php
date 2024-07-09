@extends('layout.twlayout')
<link rel="stylesheet" href="css/sidebar.css">
<style>
    body {
        color: white;
        overflow-x: hidden;
        min-width: 100vw;
        min-height: 100vh;
        background-image: url('asset/bg-bom-main.png');
        background-size: cover;
        background-position: center 30%;
        margin: 0;
        padding: 0;
    }

    .card {
        background: linear-gradient(125deg, rgba(61, 37, 84, 1) 0%, rgba(123, 48, 176, 1) 51%, rgba(120, 27, 55, 1) 100%);
        animation: moveGradient 10s linear infinite;
        /* Adjust animation duration as needed */
        box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);

        background-size: 400%;
    }


    @keyframes moveGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    #title {
        font-weight: bold;
        font-size: 3rem;
        letter-spacing: 0.3rem;
        text-shadow:
            0 0 4px #fff,
            0 0 10px #fff,
            0 0 38px #8048e0,
            0 0 73px #5f48e0;
    }

    .btn {
        background-color: rgba(255, 255, 255, 0.17) !important;
        backdrop-filter: blur(40px) !important;
    }

    .btn:hover {
        box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.4);
        -webkit-box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.4);
        -moz-box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.4);
    }
</style>


@section('content')
@if (session('error'))
<script>
    Swal.fire({
        title: "Warning !",
        text: "{{ session('error') }}",
        icon: "warning"
    });
</script>
@endif
<div class="w-screen flex justify-center items-center py-7">
    <h1 class="text-center" id='title'>Welcome, {{ $username }}</h1>
</div>
<div class="w-screen flex justify-center items-center my-7">
    <div class="flex">
        <div class="card w-[400px] h-[400px] mx-10 rounded-xl">
            <h3 class="text-center text-2xl font-bold py-3">Elimination 1 Big Game</h3>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Menguji kecepatan dan ketepatan</p>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Soal tidak wajib dikerjakan semua</p>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Poin diperoleh dari setiap soal yang
                dijawab
                dan benar</p>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Jenis soal berupa penyelesaian
                operasi
                penjumlahan, perkalian,
                pembagian, pengurangan, perpangkatan, dan faktorial.</p>
            <p class="text-sm px-5 py-4"></p>
            <div class="enter-button w-full flex justify-center items-center mt-5">
                {{-- Real Assessment link --}}
                <a class="btn border-2 w-11/12 text-center h-[40px] mt-3 flex items-center justify-center rounded-xl !backdrop-blur-xl" href="{{ route('user.elim_satu') }}" type="button">ENTER</a>

                {{-- Coming soon for assessment page --}}
                {{-- <a class="btn border-2 w-11/12 text-center h-[40px] mt-3 flex items-center justify-center rounded-xl !backdrop-blur-xl"
                        href="{{ route('user.comingSoon') }}" type="button">ENTER</a> --}}
            </div>
        </div>



        <div class="card w-[400px] h-[400px] mx-12 rounded-xl ">
            <h3 class="text-center text-2xl font-bold py-3">Elimination 1 Mini game</h3>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Menguji kecepatan dan ketepatan</p>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Terdiri dari beberapa butir soal</p>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Soal wajib dikerjakan semua</p>
            <p class="text-sm px-5 py-2"><i class="fa-solid fa-circle text-xs"></i> Tim yang sudah menyelesaikan semua labirin akan mendapat benefit</p>
            <p class="text-sm px-5 py-3"></p>
            <p class="text-sm px-5 py-2"></p>
            <p class="text-sm px-5 py-2"></p>
            <p class="text-sm px-5 py-5"></p>
            <div class="enter-button w-full flex justify-center items-center mt-5">
                {{-- Real Assessment link --}}
                <a class="btn border-2 w-11/12 text-center h-[40px] mt-3 flex items-center justify-center rounded-xl !backdrop-blur-xl" href="{{ route('user.game_elim1') }}" type="button">ENTER</a>

                {{-- Coming soon for assessment page --}}
                {{-- <a class="btn border-2 w-11/12 text-center h-[40px] mt-3 flex items-center justify-center rounded-xl !backdrop-blur-xl"
                        href="{{ route('user.comingSoon') }}" type="button">ENTER</a> --}}
            </div>
        </div>
    </div>
</div>

<style>
    .enter-button {
        bottom: 0;
    }
</style>
@endsection