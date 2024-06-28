@extends('admin.layout.main')

@section('content')
<div class="container mx-auto">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Elim Dua Score</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-disc list-inside text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="my-form" method="POST">
            @csrf
            <div class="mb-4">
                <label for="namaKelompok" class="block text-sm font-medium text-gray-700">Nama Kelompok</label>
                <input type="text" name="namaKelompok" id="namaKelompok" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('namaKelompok') }}" required>
                <div id="namaKelompok_list">

                </div>
                @if ($errors->has('namaKelompok'))
                <span class="text-red-600">{{ $errors->first('namaKelompok') }}</span>
                @endif
            </div>
            <script>
                $(document).ready(function() {
                    $('#namaKelompok').on('keyup', function() {
                        var value = $(this).val();
                        $.ajax({
                            url: "{{ route('admin.elimduaView') }}",
                            type: "GET",
                            data: {
                                'namaKelompok': value
                            },
                            success: function(data) {
                                $("#namaKelompok_list").html(data);
                            }
                        });
                    });

                    $(document).on('click', 'li', function() {
                        var value = $(this).text();
                        $("#namaKelompok").val(value);
                        $("#namaKelompok_list").html("");
                    })
                });
            </script>


            <div class="mb-4">
                <label for="poinDidapat" class="block text-sm font-medium text-gray-700">Jumlah Poin</label>
                <input type="number" name="poinDidapat" id="poinDidapat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                @if ($errors->has('poinDidapat'))
                <span class="text-red-600">{{ $errors->first('poinDidapat') }}</span>
                @endif
            </div>

            <button type="submit" id="btnSubmit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Add Poin</button>
        </form>

        <script>
            $(document).ready(function() {
                $("#my-form").submit(function(event) {
                    event.preventDefault();

                    var form = $("#my-form")[0];
                    var data = new FormData(form);

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, add point!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Panggil fungsi untuk mengirim data ke database
                            $.ajax({
                                type: "POST",
                                url: "{{ route('admin.elimduaStore') }}",
                                data: data,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: "The point has been added successfully.",
                                        icon: "success"
                                    });
                                },
                                error: function(e) {
                                    let errorMessage = e.responseJSON.message || "Terjadi kesalahan. Silakan coba lagi.";
                                    // Menampilkan alert menggunakan SweetAlert2
                                    Swal.fire({
                                        title: 'Error',
                                        text: errorMessage,
                                        icon: 'error'
                                    });
                                }
                            });


                        }
                    });
                });
            });
        </script>
    </div>
    @endsection