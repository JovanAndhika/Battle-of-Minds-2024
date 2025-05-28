@extends('admin.layout.main')

@section('content')
    @if (session()->has('success'))
        <script>
            Swal.fire('Success!', '{{ session("success") }}', 'success');
        </script>
    @endif

    <div class="container mx-auto bg-white max-w-lg rounded shadow p-5 my-5">
        <form action="{{ route('admin.pass.reset') }}" method="POST">
            @csrf
            <div class="my-3">
                <label for="namaKelompok" class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
                <input type="text" name="namaKelompok" id="namaKelompok"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </div>
            <div class="my-3">
                <label for="newPass" class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="newPass" id="newPass"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </div>
            <button type="submit" id="btnSubmit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Reset Password</button>
        </form>
    </div>
@endsection
