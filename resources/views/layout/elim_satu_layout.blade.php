@extends('layout.twlayout')
@section('head')
<style>
    body {
        background-image: url('asset/bg-bom-main.png');
        background-size: cover;
        background-position: center;
        color: white;
        min-height: 100vh !important;
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
        backdrop-filter: blur(20px);
        border: 4px solid white;
        padding: 30px;
        box-shadow: 2px 10px 10px 2px #ffffff;
    }

    #question-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }

    .page {
        place-self: center;
    }

    .answer-input {
        border-radius: 5px;
        border: none;
        padding: 0 9px;
        height: 30px;
    }

    .pagination .page-link {
        background-color: #5f48e0;
        border-color: #fff;
    }

    .pagination .page-item.active .page-link {
        background-color: #fff;
        border-color: #fff;
        color: #5f48e0 !important;
    }

    .pagination .page-link:hover {
        background-color: #fff;
        color: #5f48e0;
        cursor: pointer;
    }

    .pagination .page-link,
    .pagination .page-item.active .page-link {
        color: #ffffff;
    }


    @media (max-width: 768px) {
        .title {
            font-size: 2rem;
        }
    }

    .checked {
        background-color: lightskyblue !important;
        /* Atur gaya CSS yang sesuai */
        color: white;
    }
</style>
@endsection

@section('content')

<body>

    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "{{ session('success') }}",
            text: "{{ session('count') }}"
        });
    </script>
    @endif

    <div class="container">
        <div class="header">
            <h1 class="text-center title my-4">Big Game Elimination 1</h1>
        </div>
        <div class="form-content mb-5">
            @yield('form_soal')


        </div>
    </div>
    <!-- Tombol SAVE -->
    <button type="button" onclick="submit_jawaban()" id="btn-save-jawaban"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
           font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 
           dark:focus:ring-blue-800">
        SAVE
    </button>

    <!-- Tombol BOM DORR (Hidden default) -->
    <a onclick="submit_pagination(100)" type="button" id="btn-soalbom" hidden
        class="text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 
           font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-yellow-900 cursor-pointer">
        BOM DORR
    </a>

    <!-- Tombol Back -->
    <a href="{{ route('user.view') }}" type="button" id="btn-back"
        class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 
           font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-gray-800 
           dark:focus:ring-gray-800">
        Back
    </a>

    <style>
        #btn-back {
            position: fixed;
            z-index: 99;
            top: 10%;
            left: 8%;
        }

        #btn-save-jawaban {
            position: fixed;
            z-index: 99;
            left: 80%;
            top: 90%;
            width: 150px;
        }

        #btn-soalbom {
            position: fixed;
            z-index: 99;
            left: 15%;
            top: 90%;
            width: 150px;
        }

        @media only screen and (max-width: 600px) {
            #btn-save-jawaban {
                position: fixed;
                top: 90%;
                left: 30%;
            }
        }
    </style>
    <!-- <div class="page mt-5 d-flex justify-content-center flex-column">
        <div id="timer" class="mb-3 fs-3 d-flex justify-content-center"></div>
        <ul id="pagination" class="pagination d-flex justify-content-center">
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(1)" id="pagination1">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(2)" id="pagination2">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(3)" id="pagination3">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(4)" id="pagination4">4</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(5)" id="pagination5">5</a>
            </li>
            <li class="page-item">
                <a class="page-link" onclick="submit_pagination(6)" id="pagination6">6</a>
            </li>
        </ul>
    </div> -->
</body>

<script>
    function submit_jawaban() {
        document.getElementById('simpan-jawaban').submit();
    }

    function submit_pagination(page_value) {
        var input = document.createElement('Input');
        var simpan_jawaban_form = document.getElementById('simpan-jawaban');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'page');
        input.setAttribute('value', page_value);

        simpan_jawaban_form.appendChild(input);
        simpan_jawaban_form.submit();

    }
</script>
@endsection