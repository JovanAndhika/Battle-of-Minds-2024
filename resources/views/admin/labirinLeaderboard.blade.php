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
<style>
    .large-font {
        font-size: 1.25rem;
        /* Adjust the size as needed */
    }

    #timer {
        position: fixed;
        z-index: 0;
        top: 36%;
        left: 35%;
        font-size: 7rem;
        color: white;
        -webkit-text-stroke: 2px black;
        text-shadow: 0 5px 1px black;
    }

    .container-table {
        z-index: 99;
    }
</style>

<div id="timer" class="mb-3 fs-3 d-flex justify-content-center"></div>

<div class="flex justify-center">
    <div class="container-table mt-10 p-5 bg-white w-11/12 rounded-lg">
        <div class="flex justify-start relative overflow-x-auto">
            <table id="myTable" class="display stripe text-lg large-font" style="width: 100%">
                <thead class="bg-gray-900 text-gray-50">
                    <tr>
                        <th>Rank</th>
                        <th>Nama Kelompok</th>
                        <th>Asal Sekolah</th>
                        <th>Labirin_1</th>
                        <th>Labirin_2</th>
                        <th>Labirin_3</th>
                        <th>Completed at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $l)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $l->namaKelompok }}</td>
                        <td>{{ $l->asalSekolah }}</td>
                        <td>{{ $l->labirin_1 ?? 'none' }}</td>
                        <td>{{ $l->labirin_2 ?? 'none' }}</td>
                        <td>{{ $l->labirin_3 ?? 'none' }}</td>
                        <td>{{ $l->is_completed ?? 'none' }}</td>
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

<script>
    var now = new Date().getTime();
    var timer = new Date("July 23, 2024 12:47:00").getTime();

    var countdownTime = timer - now;; // misalnya, 60 detik

    window.onload = function() {
        startCountdown();
    };

    function startCountdown() {
        var countdownInterval = setInterval(function() {
            countdownTime--;

            if (countdownTime <= 0) {
                var getTimer = document.getElementById("timer")
                getTimer.innerHTML = "00:00:00";
                clearInterval(countdownInterval);
            }
            displayTime();
        }, 1000);
    }


    function displayTime() {
        var hours = Math.floor(countdownTime / (1000 * 60 * 60));
        var minutes = Math.floor((countdownTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((countdownTime % (1000 * 60)) / 1000);

        // Perbarui countdownTime setelah menghitung kembali jam, menit, dan detik
        countdownTime = hours * (1000 * 60 * 60) + minutes * (1000 * 60) + seconds * 1000;

        var timerDisplay = document.getElementById("timer");
        timerDisplay.innerHTML = (hours < 10 ? "0" : "") + hours + ":" +
            (minutes < 10 ? "0" : "") + minutes + ":" +
            (seconds < 10 ? "0" : "") + seconds;
            
            if (countdownTime <= 0) {
                timerDisplay.innerHTML = "00:00:00";
                clearInterval(countdownInterval);
            }
    }
</script>
@endsection