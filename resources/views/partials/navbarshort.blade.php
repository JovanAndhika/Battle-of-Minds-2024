<nav class="nav navbar navbar-expand-lg navbar-light">
    <div class="nav-container container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}"><img id="logo-bom" src="{{ asset('asset/logo-main.png') }}" alt="logo bom 2024"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    nav {
        z-index: 99;
        background-color: purple;
    }

    .navbar-light .navbar-nav .nav-link {
        color: rgba(252, 252, 252, 1) !important;
    }

    #logo-bom {
        height: 60px;
        width: 180px;
    }
</style>