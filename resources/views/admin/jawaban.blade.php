@extends('admin.layout.main')

@section('content')

    <style>
        .dt-search {
            display: block !important;
        }
    </style>

    <div class="flex justify-center">
        <div class="mt-10 p-5 bg-white w-11/12 rounded-lg">
            <div class="relative">
                <table id="myTable" class="display stripe" style="width: 100%">
                    <thead class="bg-gray-900 text-gray-50">
                        <tr>
                            <th>No</th>
                            <th>Jawaban</th>
                            <th>Kunci Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jawabans as $jawaban)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jawaban->jawaban_kelompok }}</td>
                                <td>{{ $jawaban->jawaban }}</td>
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
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left dt-body-left'
            }],
            layout: {
                top: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                },
                topStart: 'pageLength',
                topEnd: 'search',
            },
        });
    </script>
@endsection
