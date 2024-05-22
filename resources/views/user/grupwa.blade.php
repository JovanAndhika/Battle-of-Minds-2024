@extends('layout.twlayout')

<style>
    body {
        background-image: url('asset/bg-bom-main.png');
        background-size: cover;
        background-position: center 96%;
        color: white;
        overflow-x: hidden;
        position: relative;
    }

    .title {
        font-weight: bold;
        font-size: 3rem;
        text-shadow:
            0 0 4px #fff,
            0 0 10px #fff,
            0 0 38px #8048e0,
            0 0 73px #5f48e0;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(20px);
    }

    .link {
        background: linear-gradient(125deg, rgba(120, 27, 55, 1), rgba(123, 48, 176, 1) 51%, rgba(61, 37, 84, 1) 100%);
        box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
    }
</style>
<link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

@section('content')
    <div class="w-screen h-screen flex flex-col justify-center items-center">
        <div class="container h-[300px] flex flex-col justify-center items-center">
            <p class="w-[600px] md:text-3xl text-center max-md:text-2xl max-md:w-[320px] text-gray-100">Terimakasih telah
                mendaftar
                sebagai peserta Battle of Minds 2024!</p>

            <p class="text-center sm:mt-6 text-base max-sm:mt-9">Join grup Whatsapp peserta Battle of Minds 2024:</p>
            <a href="https://chat.whatsapp.com/L5c6PPx9JToIXxLabvMAKB"
                class="link w-[100px] h-[40px] rounded-xl max-md:mt-3 md:mt-7 text-center flex items-center justify-center">Join</a>
        </div>
    </div>
@endsection
