@extends('layout.elim_satu_layout')

@section('form_soal')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        for (var angka = 1; angka <= 50; angka++) {
            cekNilai(angka);
        }
    });

    function cekNilai(questionNumber) {
        var inputName = 'biggamesanswer' + questionNumber;
        var nilai = document.getElementById(inputName).value;
        var inputElement = document.getElementById(inputName);

        if (nilai === null || nilai === '') {
            inputElement.classList.remove('checked');
        } else {
            inputElement.classList.add('checked');
        }
    }
</script>

@if (Session::has('saveBom'))
<script>
    Swal.fire({
        title: "Answer saved!",
        text: "Jawaban untuk soal bom dor tersimpan!",
        icon: "success"
    });
</script>
@endif


<form method="POST" action="{{ route('user.simpan_jawabanA') }}" id="simpan-jawaban" class="form-simpan-jawaban" autocomplete="off">
    @csrf
    <div id="question-container">
        @php
        $questionNumber = 1;
        @endphp
        @foreach ($data_jawaban as $data)
        @if ($data->kunci_jawabans_id >= 1 && $data->kunci_jawabans_id <= 30) <div id="page-1" class="page">
            <h1 class="mt-5 fs-3">Question {{ $questionNumber }}:</h1>
            <div class="mt-3">
                <input class="answer-input" type="text" name="biggamesanswer{{ $questionNumber }}" id="biggamesanswer{{ $questionNumber }}" value='{{ $data->jawaban_kelompok }}' required placeholder="Answer here" autocomplete="off">
            </div>
            @php
            $questionNumber++;
            @endphp
    </div>
    @endif
    @endforeach
    </div>
</form>


<style>
    input{
        color: black;
    }
</style>
@endsection