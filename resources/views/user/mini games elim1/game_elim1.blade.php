@extends('layout.mainlayout')

{{-- BOM 2024 | MiniGame Elimination 1 --}}
@section('title', $title)

@section('content')
<!-- style -->
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
        box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -webkit-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1);
        -moz-box-shadow: 1px 0px 14px 4px rgba(255, 255, 255, 1); */
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
        margin-top: 30px;
        letter-spacing: 0.3rem;
        text-shadow:
            0 0 4px #fff,
            0 0 10px #fff,
            0 0 38px #8048e0,
            0 0 73px #5f48e0;
    }
    
/* GEMBOK styles */
    *,
    *:after,
    *:before {
        box-sizing: border-box;
    }

    :root {
        --transition: 0.2;
        --bg-one: hsl(280, 60%, 5%);
        --bg-two: hsl(280, 90%, 15%);
        --stop: 40;
        --angle: 45;
        --border-width: 5;
        --padlock-size: 300;
        --border-radius: 6;
    }


    form {
        display: grid;
        grid-template-columns: auto;
        grid-gap: 0.5rem 1rem;
        justify-items: center;
        position: relative;
    }

    [type='password'] {
        padding: 12px 20px;
        font-size: 1rem;
        border-width: calc(var(--border-width) * 1px);
        border-style: solid;
        border-color: var(--accent);
        border-radius: calc(var(--border-radius) * 1px);
        text-align: center;
        outline: transparent;
        width: 100%;
        transition: border-color calc(var(--transition, 0.2) * 1s) ease;
    }

    [type='password']:valid {
        --accent: hsla(100, 100%, 50%, 1);
    }

    [type='password']:invalid {
        --accent: hsla(10, 100%, 50%, 0.5);
    }

    [type='password']:placeholder-shown {
        --accent: hsl(0, 0%, 100%);
    }

    [for='password'] {
        #login {
            height: 0;
            width: 0;
            transform: scale(0);
            position: absolute;
        }
    }

    .padlock {
        --hue: 65;
        --color: hsl(50, 100%, 50%);
        --color-one: hsl(38, 100%, 50%);
        --color-two: hsl(0, 0%, 100%);
        height: calc(var(--padlock-size) * 1px);
        width: calc(var(--padlock-size) * 1px);
        grid-row: 1;
        position: relative;
    }

    .padlock__body {
        border: 8px solid black;
        border-radius: 20px;
        position: absolute;
        bottom: 10%;
        width: 66%;
        height: 46%;
        left: 50%;
        transform: translate(-50%, 0);
        background: var(--color);
        box-shadow: -30px 0 0px 0px var(--color-one) inset, 10px 0 0px 0px var(--color-two) inset;
    }

    .padlock__face {
        height: 25%;
        width: 40%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .padlock__eye {
        position: absolute;
        height: 15px;
        width: 15px;
        background: hsl(0, 0%, 0%);
        top: 0;
        border-radius: 50%;
        animation: blink 4s infinite linear;
    }

    .padlock__eye:after {
        content: '';
        height: 25%;
        width: 25%;
        background: hsl(0, 0%, 100%);
        border-radius: 50%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-100%, -100%);
    }

    .padlock__eye--left {
        left: 0;
    }

    .padlock__eye--right {
        right: 0;
    }

    @keyframes blink {
        0%, 24%, 27%, 100% {
            transform: scaleY(1);
        }
        25%, 26% {
            transform: scaleY(0);
        }
    }

    .padlock__mouth {
        width: 25%;
        height: 10px;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0);
    }

    .padlock__mouth--one {
        background: black;
        height: 5px;
        width: 40%;
        left: 45%;
        bottom: 25%;
        display: block;
    }

    .padlock__mouth--two,
    .padlock__mouth--three {
        height: 24px;
        width: 20px;
        border-radius: 50%;
        bottom: 24%;
        background: transparent;
        display: none;
        overflow: hidden;
        clip-path: inset(64% 0 0 0);
    }

    .padlock__mouth--two:before {
        content: '';
        height: 100%;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 50%;
        border: 4px solid hsl(0, 0%, 0%);
    }

    .padlock__mouth--three {
        background: hsl(0, 0%, 0%);
    }

    .padlock__mouth--three:after {
        content: '';
        position: absolute;
        height: 6px;
        width: 10px;
        border-radius: 50%;
        bottom: -2px;
        left: 40%;
        background: red;
    }

    .padlock__hook {
        --delay: 1;
        --clip: 40;
        width: 50%;
        height: 90%;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, calc(var(--pos, 40) * -1%));
        transition: transform calc(var(--transition, 0.2) * 1s) calc(((var(--transition, 0.2) * 1.5) * var(--delay, 0)) * 1s) cubic-bezier(.78, .16, .64, 1.8);
        clip-path: inset(0 0 30% 0);
    }

    .padlock__hook:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: calc(100% - 16px);
        height: calc(100% - 16px);
        border-radius: 50% / 40%;
        transform: translate(-50%, -50%);
        box-shadow: 5px 0 0 0 hsl(0, 0%, 100%) inset, -10px 0 0 0 hsl(0, 0%, 40%) inset;
        clip-path: polygon(0 0, 100% 0, 100% calc(var(--clip) * 1%), 50% calc(var(--clip) * 1%), 50% 100%, 0 100%);
    }

    .padlock__hook > div {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .padlock__hook > div:nth-of-type(1) {
        width: 100%;
        height: 100%;
        border: 36px solid #000;
        border-radius: 50% / 40%;
        clip-path: polygon(0 0, 100% 0, 100% calc(calc(var(--clip) * 1%) + 8px), 50% calc(calc(var(--clip) * 1%) + 8px), 50% 100%, 0 100%);
    }

    .padlock__hook > div:nth-of-type(2) {
        width: calc(100% - 16px);
        height: calc(100% - 16px);
        border: 20px solid hsl(0, 0%, 75%);
        border-radius: 50% / 40%;
        clip-path: polygon(0 0, 100% 0, 100% calc(var(--clip) * 1%), 50% calc(var(--clip) * 1%), 50% 100%, 0 100%);
    }


        /* Functionality */
        [type='password']:valid ~ #login,
        [type='password']:valid ~ [for='login'] {
            visibility: visible;
        }

        [type='password']:valid ~ [for='login']:hover ~ .padlock .padlock__mouth--one,
        [type='password']:valid ~ [for='login']:hover ~ .padlock .padlock__mouth--two {
            display: none;
        }

        [type='password']:valid ~ [for='login']:hover ~ .padlock .padlock__mouth--three {
            display: block;
        }

        [type='password']:valid ~ .padlock .padlock__mouth--one {
            display: none;
        }

        [type='password']:valid ~ .padlock .padlock__mouth--two {
            display: block;
        }

        [type='password']:valid ~ .padlock .padlock__hook {
            --pos: 60;
            --delay: 0;
        }
        
        #login,
        [for='login'],
        .logout-message {
            visibility: hidden;
        }

      
   


     

    @keyframes float {
        0% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
        100% {
            transform: translateY(0);
        }
    }

    .padlock  {
        animation: float 2s ease-in-out infinite;
    }


        /* CSS detail dalam card */
        .card {
            margin-top: 20px;
            width: 18rem; 
            border-radius: 10px;
          
          
        }
       
        #password {
            margin-top: -10px;
            width: 250px;
            height: 30px;
            font-size: 14px;
        }

        .padlock {
            margin-top: 20px;
        }

        .card-title{
            font-size: 30px;
            margin-top: 10px;
            font-weight: 900;
            font-weight: bold;
            letter-spacing: 0.3rem;
            text-shadow:
                0 0 4px #fff,
                0 0 10px #fff,
                0 0 38px #8048e0,
                0 0 73px #5f48e0;
        }

        .card-body{
            display: flex; 
            flex-direction: column; 
            align-items: center;

        }

        .login-button {
        width: 100px;
        height: 30px; 
        margin-top: 12px;
        background-color: rgba(255, 255, 255, 0.17) ;
        backdrop-filter: blur(40px) ;
        border: 1px solid #ccc; 
        border-radius: 3px; 
        cursor: pointer; 
        text-align: center;
      
        }

        .login-button:hover {
            box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.4);
            -webkit-box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.4);
            -moz-box-shadow: 0px 0px 10px 7px rgba(255, 255, 255, 0.4);
        }
</style>

    {{-- CONTENT HERE --}}
    <h2 class="text-center" id='title'>Mini Game Elimination 1</h2>

    {{-- START CARD --}}
    <div style="display: flex; gap: 30px; justify-content: center;">
        {{-- card 1 --}}
        <div class="card"> 
            <div class="card-body">
                <h5 class="card-title">Labirin 1</h5>
                <form onsubmit="return false;">
                    {{-- <label for="password">Password</label> --}}
                    <input id="password" type="password" pattern="rzxqfsvhg" placeholder="Enter your password" required >
                    
                    <label class="login-button" for="login">
                        <a href="{{route('user.soal_labirin1')}}" class="text-white text-decoration-none"> Next </a>
                    </label>
                    
                    <div class="padlock">
                        <div class="padlock__hook">
                            <div class="padlock__hook-body"></div>
                            <div class="padlock__hook-body"></div>
                        </div>
                        <div class="padlock__body">
                            <div class="padlock__face">
                                <div class="padlock__eye padlock__eye--left"></div>
                                <div class="padlock__eye padlock__eye--right"></div>
                                <div class="padlock__mouth padlock__mouth--one"></div>
                                <div class="padlock__mouth padlock__mouth--two"></div>
                                <div class="padlock__mouth padlock__mouth--three"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    
        {{-- card 2 --}}
        <div class="card"> 
            <div class="card-body">
                <h5 class="card-title">Labirin 2</h5>
                <form onsubmit="return false;">
                    {{-- <label for="password">Password</label> --}}
                    <input id="password" type="password" pattern="otraegpv" placeholder="Enter your password" required>
                    
                    <label class="login-button" for="login">
                        <a href="{{route('user.soal_labirin2')}}" class="text-white text-decoration-none"> Next </a>
                    </label>
                    
                    <div class="padlock">
                        <div class="padlock__hook">
                            <div class="padlock__hook-body"></div>
                            <div class="padlock__hook-body"></div>
                        </div>
                        <div class="padlock__body">
                            <div class="padlock__face">
                                <div class="padlock__eye padlock__eye--left"></div>
                                <div class="padlock__eye padlock__eye--right"></div>
                                <div class="padlock__mouth padlock__mouth--one"></div>
                                <div class="padlock__mouth padlock__mouth--two"></div>
                                <div class="padlock__mouth padlock__mouth--three"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- card 3 --}}
        <div class="card"> 
            <div class="card-body" >
                <h5 class="card-title">Labirin 3</h5>
                <form onsubmit="return false;">
                    {{-- <label for="password">Password</label> --}}
                    <input id="password" type="password" pattern="password123" placeholder="Enter your password" required >
                    
                    <label class="login-button" for="login">
                        <a href="{{route('user.soal_labirin3')}}" class="text-white text-decoration-none"> Next </a>
                    </label>
                    
                    <div class="padlock">
                        <div class="padlock__hook">
                            <div class="padlock__hook-body"></div>
                            <div class="padlock__hook-body"></div>
                        </div>
                        <div class="padlock__body">
                            <div class="padlock__face">
                                <div class="padlock__eye padlock__eye--left"></div>
                                <div class="padlock__eye padlock__eye--right"></div>
                                <div class="padlock__mouth padlock__mouth--one"></div>
                                <div class="padlock__mouth padlock__mouth--two"></div>
                                <div class="padlock__mouth padlock__mouth--three"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- end card --}}
    </div>
    
 

    
@endsection
