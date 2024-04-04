@extends('admin.layout.main')

@section('content')
<style>
    body {
        background-color: #d4d4d4
    }

    div.dt-container {
        width: 100vw;
        margin: 0 3%;
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
            <table id="myTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Paket A</th>
                        <th>Paket B</th>
                        <th>Paket C</th>
                        <th>Paket D</th>
                        <th>Paket E</th>
                        <th>Paket F</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Set Jawaban</td>
                        <td>
                            <form action="{{ route('admin.setReadyA') }}" method="post">
                                @csrf
                                <button type="submit" id="id-paketA" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Set paket A</button>
                            </form>
                            @if ($cekPaketA === 1)
                            <script>
                                $(document).ready(function() {
                                    $('#id-paketA').prop('disabled', true);
                                });
                            </script>
                            @endif

                        </td>
                        <td>B</td>
                        <td>C</td>
                        <td>D</td>
                        <td>E</td>
                        <td>F</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    new DataTable('#myTable', {
        scrollX: true,
        'bInfo': false,
        'bLengthChange': false,
        'language': {
            searchPlaceholder: 'Search for Peserta'
        },
        columnDefs: [{
            targets: '_all',
            className: 'dt-body-left'
        }],
        // columns: [
        // null, null, null, {
        //     width: '15%'
        // },
        // null, {
        //     width: '1%'
        // }, {
        //     width: '15%'
        // },
        // null, null
        // ],
    });
</script>
@endsection