@extends('admin.layout.main')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil !",
                text: "{{ session('success') }}",
                icon: "success"
            });
        </script>
    @endif
    <div class="flex justify-center">
        <div class="flex justify-center mt-10 p-5 bg-white w-11/12 rounded-lg">
            <div class="relative overflow-x-auto w-11/12">
                <table id="myTable" class="stripe" style="width: 100%">
                    <thead class="bg-gray-900 text-gray-50">
                        <tr>
                            <th>No</th>
                            <th>Asal Sekolah</th>
                            <th>Nama Kelompok</th>
                            <th>Jumlah Poin</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertas as $peserta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $peserta->asalSekolah }}</td>
                                <td>{{ $peserta->namaKelompok }}</td>
                                <td>
                                    <form class="max-w-md" action="{{ route('admin.poin.update') }}" method="post">
                                        @csrf
                                        <div class="relative">
                                            <input type="hidden" name="namaKelompok" value="{{ $peserta->namaKelompok }}">
                                            @error('namaKelompok')
                                                <script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: '{{ $message }}'
                                                    });
                                                </script>
                                            @enderror
                                            <input type="text" id="default-search" value="{{ $peserta->poin + $peserta->data_bomsoal->poinBom ?? 0 }}"
                                                name="poin"
                                                class="block w-full md:ps-10 md:p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                                required />
                                            @error('poin')
                                                <script>
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error',
                                                        text: '{{ $message }}'
                                                    });
                                                </script>
                                            @enderror
                                            <button type="submit"
                                                class="text-white md:absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Update</button>
                                        </div>
                                    </form>
                                </td>
                                <td><button type="button"
                                        onclick="window.location = '/admin/jawaban/{{ $peserta->namaKelompok }}'"
                                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Jawaban</button>
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
            layout: {
                top: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },
            'bLengthChange': false,
            'language': {
                searchPlaceholder: 'Search Kelompok'
            },
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left dt-body-left'
            }],
        });
    </script>
@endsection
