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
                                <button type="submit" id="set-status-a">Tekan</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.setReadyB') }}" method="post">
                                @csrf
                                <button type="submit" id="set-status-b">Tekan</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.setReadyC') }}" method="post">
                                @csrf
                                <button type="submit" id="set-status-c">Tekan</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('admin.setReadyD') }}" method="post">
                                @csrf
                                <button type="submit" id="set-status-d">Tekan</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('admin.setReadyE') }}" method="post">
                                @csrf
                                <button type="submit" id="set-status-e">Tekan</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{ route('admin.setReadyF') }}" method="post">
                                @csrf
                                <button type="submit" id="set-status-f">Tekan</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @foreach ($selectionStatus as $s)
                @if ($s->status_paket_a == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-a").prop('disabled', true);
                    });
                </script>
                @endif

                @if ($s->status_paket_b == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-b").prop('disabled', true);
                    });
                </script>
                @endif

                @if ($s->status_paket_c == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-c").prop('disabled', true);
                    });
                </script>
                @endif

                @if ($s->status_paket_d == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-d").prop('disabled', true);
                    });
                </script>
                @endif

                @if ($s->status_paket_e == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-e").prop('disabled', true);
                    });
                </script>
                @endif

                @if ($s->status_paket_f == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-f").prop('disabled', true);
                    });
                </script>
                @endif
                @endforeach

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