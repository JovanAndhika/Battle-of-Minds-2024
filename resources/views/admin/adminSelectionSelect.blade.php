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
                        <th>Set Ready</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Set Jawaban</td>
                        <td>
                            <form action="{{ route('admin.setReady') }}" method="post">
                                @csrf
                                <button type="submit" id="set-status-a">Tekan</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @foreach ($selectionStatus as $s)
                @if ($s->status_set == true)
                <script>
                    $(document).ready(function() {
                        // Attach a click event handler to the button with id "myButton"
                        $("#set-status-a").prop('disabled', true);
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