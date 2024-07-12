@extends('admin.layout.main')
@section('content')
    <style>
        div.dt-container {
            width: 100vw;
            margin: 0 3%;
        }

        .animated-background {
            background-size: 400%;

            -webkit-animation: animation 3s ease infinite;
            -moz-animation: animation 3s ease infinite;
            animation: animation 3s ease infinite;
        }

        @keyframes animation {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }
    </style>

    <div class="winner-container flex flex-row justify-around mt-[100px] mb-0">
        <div class="p-5 my-10 w-1/4 bg-pink-500 rounded-lg">
            <h1 class="text-white ms-5">Rank 2</h1>
            <div class="bg-white rounded rounded-full w-1/4 flex justify-center mx-auto border-white p-5">
                <img src="{{ asset('asset/maskot_bom.png') }}" alt="">
            </div>
            <h5 class="text-center text-white mb-10">{{ $second->namaKelompok }}</h5>
            <h5 class="text-white flex justify-end self-end">Poin : {{ $second->poin + $second->data_bomsoal->poinBom ?? 0 }}
            </h5>
        </div>
        <div
            class="animated-background bg-white bg-gradient-to-r from-red-500 via-purple-500 to-blue-500 w-1/4 rounded-lg p-5 max-h-[250px]">
            <h1 class="text-white ms-5">Rank 1</h1>
            <div class="bg-white rounded rounded-full w-1/4 flex justify-center mx-auto border-white p-5">
                <img src="{{ asset('asset/maskot_bom.png') }}" alt="">
            </div>
            <h5 class="text-center text-white font-bold mb-12">{{ $first->namaKelompok }}</h5>
            <h5 class="text-white flex justify-end self-end">Poin : {{ $first->poin + $first->data_bomsoal->poinBom ?? 0 }}
            </h5>
        </div>
        <div class="p-5 my-10 w-1/4 bg-blue-500 rounded-lg">
            <h1 class="text-white ms-5">Rank 3</h1>
            <div class="bg-white rounded rounded-full w-1/4 flex justify-center mx-auto border-white p-5">
                <img src="{{ asset('asset/maskot_bom.png') }}" alt="">
            </div>
            <h5 class="text-center text-white mb-10">{{ $third->namaKelompok }}</h5>
            <h5 class="text-white flex justify-end self-end">Poin: {{ $third->poin + $third->data_bomsoal->poinBom ?? 0 }}
            </h5>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mt-10 p-5 bg-white w-11/12 rounded-lg">
            <div class="flex justify-start relative overflow-x-auto">
                <table id="myTable" class="display stripe" style="width: 100%">
                    <thead class="bg-gray-900 text-gray-50">
                        <tr>
                            <th>Rank</th>
                            <th>Nama Kelompok</th>
                            <th>Asal Sekolah</th>
                            <th>Jumlah Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertas as $peserta)
                            @if ($loop->iteration > 3)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->namaKelompok }}</td>
                                    <td>{{ $peserta->asalSekolah }}</td>
                                    <td>{{ $peserta->poin + $peserta->data_bomsoal->poinBom ?? 0 }}</td>
                                </tr>
                            @endif
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
                {
                    width: '10%'
                },
                {
                    width: '10%'
                },
                {
                    width: '10%'
                },
            ],
            layout: {
                top: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                },
                topEnd: 'search'
            },
        });
    </script>
@endsection
