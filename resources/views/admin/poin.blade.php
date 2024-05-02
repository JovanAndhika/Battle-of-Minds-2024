@extends('admin.layout.main')

@section('content')
    <style>
        body {
            background-color: #d4d4d4
        }

        select.dt-input {
            width: 65px !important;
            margin-right: 5px !important;
        }

        .dt-search {
            display: flex !important;
            justify-content: start !important;
        }

        .dt-search label {
            display: none
        }

        .dt-input {
            border-radius: 10px !important;
            width: 300px !important;
            margin-bottom: 5px
        }
    </style>

    <div class="flex justify-center">
        <div class="flex justify-center mt-10 p-5 bg-white w-11/12 rounded-lg">
            <div class="relative overflow-x-auto w-11/12">
                <table id="myTable" class="stripe" style="width: 100%">
                    <thead class="bg-gray-900 text-gray-50">
                        <tr>
                            <th>Nama Kelompok</th>
                            <th>Jumlah Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesertas as $peserta)
                            <tr>
                                <td>{{ $peserta->namaKelompok }}</td>
                                <td>{{ $peserta->poin }}</td>
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
