@extends('admin.layout.main')
@section('content')
<style>
    div.dt-container {
        width: 100vw;
        margin: 0 3%;
    }
</style>
<div class="flex justify-center">
    <div class="mt-10 p-5 bg-white w-11/12 rounded-lg">
        <div class="flex justify-start relative overflow-x-auto">
            <table id="myTable" class="display stripe" style="width: 100%">
                <thead class="bg-gray-900 text-gray-50">
                    <tr>
                        <th>No</th>
                        <th>Nama Kelompok</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesertas as $peserta)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $peserta->namaKelompok }}</td>
                        <td>{{ $peserta->asalSekolah }}</td>
                        <td>{{ $peserta->poin + $peserta->data_bomsoal->poinBom ?? 0}}</td>
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