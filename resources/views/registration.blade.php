@extends('layout.twlayout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-tr from-purple-900 via-purple-700 to-purple-500 px-4">
    <div class="w-full max-w-4xl bg-gradient-to-br from-purple-800 to-purple-600 rounded-3xl shadow-xl p-8 text-white font-sans">
        <h2 class="text-4xl font-extrabold mb-8 text-center tracking-wide">Registrasi Kelompok</h2>

        <form action="{{ route('storeRegistration') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Asal Sekolah --}}
            <div>
                <label for="asalSekolah" class="block text-lg font-semibold mb-2">Asal Sekolah</label>
                <input type="text" name="asalSekolah" id="asalSekolah" value="{{ old('asalSekolah') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Masukkan asal sekolah" required>
            </div>

            {{-- Nama Kelompok --}}
            <div>
                <label for="namaKelompok" class="block text-lg font-semibold mb-2">Nama Kelompok</label>
                <input type="text" name="namaKelompok" id="namaKelompok" value="{{ old('namaKelompok') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Masukkan nama kelompok" required>
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-lg font-semibold mb-2">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Password minimal 8 karakter" required>
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="confirmPass" class="block text-lg font-semibold mb-2">Konfirmasi Password</label>
                <input type="password" name="confirmPass" id="confirmPass"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Ulangi password" required>
            </div>

            {{-- Bukti Transaksi --}}
            <div>
                <label for="buktiTransaksi" class="block text-lg font-semibold mb-2">Bukti Transaksi (jpg/png max 10MB)</label>
                <input type="file" name="buktiTransaksi" id="buktiTransaksi" accept="image/png, image/jpeg"
                    class="block w-full text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400 rounded-lg" required>
            </div>

            {{-- Email Perwakilan --}}
            <div>
                <label for="emailPerwakilan" class="block text-lg font-semibold mb-2">Email Perwakilan</label>
                <input type="email" name="emailPerwakilan" id="emailPerwakilan" value="{{ old('emailPerwakilan') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Email perwakilan" required>
            </div>

            <hr class="border-purple-400 my-6">

            {{-- Anggota 1 --}}
            <h3 class="text-2xl font-bold mb-4">Anggota 1</h3>

            <div>
                <label for="namaSatu" class="block text-lg font-semibold mb-2">Nama</label>
                <input type="text" name="namaSatu" id="namaSatu" value="{{ old('namaSatu') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Nama anggota 1" required>
            </div>
            <div>
                <label for="kontakSatu" class="block text-lg font-semibold mb-2">Kontak</label>
                <input type="text" name="kontakSatu" id="kontakSatu" value="{{ old('kontakSatu') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Kontak anggota 1" required>
            </div>
            <div>
                <label for="kartuPelajarSatu" class="block text-lg font-semibold mb-2">Kartu Pelajar (jpg/png max 10MB)</label>
                <input type="file" name="kartuPelajarSatu" id="kartuPelajarSatu" accept="image/png, image/jpeg"
                    class="block w-full text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400 rounded-lg" required>
            </div>

            <hr class="border-purple-400 my-6">

            {{-- Anggota 2 --}}
            <h3 class="text-2xl font-bold mb-4">Anggota 2</h3>

            <div>
                <label for="namaDua" class="block text-lg font-semibold mb-2">Nama</label>
                <input type="text" name="namaDua" id="namaDua" value="{{ old('namaDua') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Nama anggota 2" required>
            </div>
            <div>
                <label for="kontakDua" class="block text-lg font-semibold mb-2">Kontak</label>
                <input type="text" name="kontakDua" id="kontakDua" value="{{ old('kontakDua') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Kontak anggota 2" required>
            </div>
            <div>
                <label for="kartuPelajarDua" class="block text-lg font-semibold mb-2">Kartu Pelajar (jpg/png max 10MB)</label>
                <input type="file" name="kartuPelajarDua" id="kartuPelajarDua" accept="image/png, image/jpeg"
                    class="block w-full text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400 rounded-lg" required>
            </div>

            <hr class="border-purple-400 my-6">

            {{-- Anggota 3 --}}
            <h3 class="text-2xl font-bold mb-4">Anggota 3</h3>

            <div>
                <label for="namaTiga" class="block text-lg font-semibold mb-2">Nama</label>
                <input type="text" name="namaTiga" id="namaTiga" value="{{ old('namaTiga') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Nama anggota 3" required>
            </div>
            <div>
                <label for="kontakTiga" class="block text-lg font-semibold mb-2">Kontak</label>
                <input type="text" name="kontakTiga" id="kontakTiga" value="{{ old('kontakTiga') }}"
                    class="w-full rounded-lg px-4 py-3 text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400" placeholder="Kontak anggota 3" required>
            </div>
            <div>
                <label for="kartuPelajarTiga" class="block text-lg font-semibold mb-2">Kartu Pelajar (jpg/png max 10MB)</label>
                <input type="file" name="kartuPelajarTiga" id="kartuPelajarTiga" accept="image/png, image/jpeg"
                    class="block w-full text-purple-900 font-semibold focus:outline-none focus:ring-2 focus:ring-purple-400 rounded-lg" required>
            </div>

            <button type="submit" class="w-full bg-purple-700 hover:bg-purple-800 transition text-white text-xl font-bold py-4 rounded-xl shadow-lg mt-8 tracking-wide">
                Daftar
            </button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Jika ada error validasi
    @if ($errors->any())
    let errorMessages = "";
    @foreach ($errors->all() as $error)
        errorMessages += "{{ $error }}<br>";
    @endforeach

    Swal.fire({
        icon: 'error',
        title: 'Oops, terjadi kesalahan!',
        html: errorMessages,
        confirmButtonColor: '#8b5cf6'
    });
    @endif

    // Jika ada alert password konfirmasi error
    @if($errors->has('confirmPass'))
    Swal.fire({
        icon: 'error',
        title: 'Password Tidak Cocok!',
        text: "{{ $errors->first('confirmPass') }}",
        confirmButtonColor: '#8b5cf6'
    });
    @endif

    // Jika ada alert registrasi gagal dari controller
    @if(session('registrationFailed'))
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('registrationFailed') }}",
        confirmButtonColor: '#8b5cf6'
    });
    @endif

    // Jika registrasi sukses
    @if(session('registrationSuccess'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('registrationSuccess') }}",
        confirmButtonColor: '#8b5cf6'
    });
    @endif
</script>
@endsection
