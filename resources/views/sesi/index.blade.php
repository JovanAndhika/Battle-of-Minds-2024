<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login BOM</title>

  <!-- Tailwind + Flowbite -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Flowbite -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>
</head>

<body class="bg-gradient-to-br from-purple-900 via-violet-800 to-fuchsia-800 min-h-screen text-white relative">

  {{-- Sidebar --}}
  @include('partials.sidebar')

  <!-- Topbar for Mobile -->
  <div class="md:hidden flex justify-between items-center p-4 bg-white/10 backdrop-blur-sm fixed w-full z-30">
    <button data-drawer-target="sidebar" data-drawer-toggle="sidebar" aria-controls="sidebar" class="text-white">
      <i class="lucide lucide-menu w-6 h-6"></i>
    </button>
    <span class="text-lg font-bold">Login</span>
  </div>

  <!-- SweetAlert Notifications -->
  @if (session('success'))
  <script>
    Swal.fire({
      title: "Berhasil!",
      text: '{{ session("success") }}',
      icon: "success"
    });
  </script>
  @endif

  @if (session('error'))
  <script>
    Swal.fire({
      title: 'Warning!',
      text: '{{ session("error") }}',
      icon: 'warning',
    });
  </script>
  @endif

  @if (session('not_validated'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Failed',
      text: '{{ session("not_validated") }}',
    });
  </script>
  @endif

  <!-- Login Container -->
  <main class="main-container flex items-center justify-center min-h-screen px-4 pt-20 z-10">
    <div class="w-full max-w-4xl bg-white/10 backdrop-blur-md shadow-xl rounded-2xl p-8">
      <form action="{{ route('session.login') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        @csrf

        <!-- Left: Form -->
        <div>
          @if (session('loginError'))
          <div class="mb-4">
            <div class="bg-red-500/80 text-white p-3 rounded-md">
              {{ session('loginError') }}
            </div>
          </div>
          @endif

          <div class="mb-4">
            <label for="namaKelompok" class="block mb-2 text-sm font-medium text-white">Nama Kelompok (peserta / admin)</label>
            <input type="text" name="namaKelompok" id="namaKelompok"
              value="{{ Session::get('namaKelompok') }}"
              class="bg-white/10 border border-gray-300 text-white text-sm rounded-lg focus:ring-purple-400 focus:border-purple-400 block w-full p-2.5"
              placeholder="Nama Kelompok" required />
          </div>

          <div class="mb-4">
            <label for="password" class="block mb-2 text-sm font-medium text-white">Password (12345678)</label>
            <input type="password" name="password" id="password"
              class="bg-white/10 border border-gray-300 text-white text-sm rounded-lg focus:ring-purple-400 focus:border-purple-400 block w-full p-2.5"
              placeholder="Password" required />
          </div>

          <div class="text-sm mb-4">
            <a href="{{ route('session.forget') }}" class="text-yellow-400 hover:underline">Forgot Password? Click Here</a>
          </div>

          <button type="submit"
            class="w-full text-white bg-purple-500 hover:bg-purple-600 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition">
            Login
          </button>
        </div>

        <!-- Right: Illustration -->
        <div class="hidden md:flex items-center justify-center">
          <img src="{{ asset('asset/icon-logo-bom.png') }}" alt="Login Illustration" class="w-3/4" />
        </div>
      </form>
    </div>
  </main>

  <script>
    lucide.createIcons();
  </script>



<style>
  .main-container{
    padding-top: 0%;
  }
</style>
</body>

</html>
