@extends('admin.layout.main')
@section('content')
    <style>
        div.dt-container {
            width: 100vw;
            margin: 0 3%;
        }

        .gambar-pembayaran {
            margin: auto;
            max-height: 600px;
            width: auto;
        }
    </style>

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil !',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
    <section class="cards">
        <div class="flex lg:flex-row max-[450px]:flex-col justify-center">
            <div
                class="mx-2 flex items-center max-w-sm p-6 border border-gray-200 rounded-lg shadow bg-gray-900 border-gray-700 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                <div class="ms-5">
                    <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-400">Jumlah Peserta
                    </h5>
                    <p class="mb-3 font-normal text-white">{{ $jumlah_peserta }}</p>
                </div>
            </div>
            <div
                class="mx-2 flex items-center max-w-sm p-6 border border-gray-200 rounded-lg shadow bg-gray-900 border-gray-700 mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                    stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-notepad-text">
                    <path d="M8 2v4" />
                    <path d="M12 2v4" />
                    <path d="M16 2v4" />
                    <rect width="16" height="18" x="4" y="4" rx="2" />
                    <path d="M8 10h6" />
                    <path d="M8 14h8" />
                    <path d="M8 18h5" />
                </svg>
                <div class="ms-5">
                    <h5 class="my-2 text-2xl font-semibold tracking-tight text-gray-400">Set Jawaban
                    </h5>
                    <form action="{{ route('admin.setReady') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Click</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="flex justify-center">

        {{-- ================================== MODAL DATA PEMBAYARAN ====================================== --}}
        <div id="modal-pembayaran" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="data-header text-xl font-semibold text-gray-900 dark:text-white">
                            Data Pembayaran
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            id="closePembayaran">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="ms-5 p-4 md:p-5 space-y-4 text-gray-50">
                        <img class="gambar-pembayaran" alt="">
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button id="closePembayaran" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- ======================================= END MODAL ========================================= --}}

        {{-- ================================== MODAL DATA PESERTA ====================================== --}}
        <div id="modal-peserta" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Data peserta
                        </h3>
                        <button type="button" id="closeData"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body modal-body p-4 md:p-5 space-y-4 relative overflow-x-auto">
                    </div>

                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="button" id="closeData"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- ======================================= END MODAL ========================================= --}}

        <div class="mt-10 p-5 bg-white w-11/12 rounded-lg">
            <div class="flex justify-start relative overflow-x-auto">
                <table id="myTable" class="display stripe" style="width: 100%">
                    <thead class="bg-gray-900 text-gray-50">
                        <tr>
                            <th>No</th>
                            <th>Asal sekolah</th>
                            <th>Nama kelompok</th>
                            <th>Bukti transaksi</th>
                            <th>Data Anggota</th>
                            <th>Jawaban</th>
                            <th>Validasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertas as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peserta->asalSekolah }}</td>
                                <td>{{ $peserta->namaKelompok }}</td>
                                <td>
                                    <button type="button" data-user-id='{{ $peserta->id }}' id="buktiBtn" data-header="bayar"
                                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">View
                                        Bukti</button>
                                </td>

                                <td><button type="button" data-user-id="{{ $peserta->id }}" id="dataBtn"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">View
                                        Data</button></td>
                                <td><button type="button"
                                        onclick="window.location = '/admin/jawaban/{{ $peserta->namaKelompok }}'"
                                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Jawaban</button>
                                </td>
                                <td>
                                    @if ($peserta->is_validated == 0)
                                        <form action="{{ route('admin.validate') }}" method="post"
                                            id="form{{ $loop->iteration }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $peserta->id }}">
                                            <button type="submit" onclick="swalAlert()"
                                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Validate</button>
                                        </form>

                                        <script>
                                            document.getElementById("form{{ $loop->iteration }}").addEventListener("submit", function(event) {
                                                event.preventDefault(); // Menghentikan aksi bawaan formulir
                                                Swal.fire({
                                                    title: "Confirm Validation?",
                                                    text: "Click yes to validate",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonColor: "#3085d6",
                                                    cancelButtonColor: "#d33",
                                                    confirmButtonText: "Yes, Validate"
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Lanjutkan dengan pengiriman formulir jika pengguna menekan tombol "Yes"
                                                        this.submit();
                                                    }
                                                });
                                            });
                                        </script>
                                    @else
                                        Already Validated
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        new DataTable('#myTable', {
            // scrollX: true,
            'bInfo': false,
            'bLengthChange': false,
            'language': {
                searchPlaceholder: 'Search Peserta'
            },
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left dt-body-left'
            }],
            columns: [{
                    width: '5%'
                },
                null, null,
                {
                    width: '10%'
                },
                {
                    width: '10%'
                },
                {
                    width: '10%'
                },
                {
                    width: '10%'
                }
            ],
            layout: {
                top: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                },
                topEnd: 'search'
            },
        });
    </script>

    <script src="{{ asset('js/listPeserta.js') }}"></script>
@endsection
