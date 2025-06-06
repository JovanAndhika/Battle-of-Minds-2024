@extends('layout.elim_satu_layout')

@section('form_soal')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            for (var angka = 251; angka <= 300; angka++) {
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

        function submit_pagination() {
            var input = document.createElement('Input');
            var simpan_jawaban_form = document.getElementById('simpan-jawaban');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'page');
            input.setAttribute('value', '6');

            simpan_jawaban_form.appendChild(input);
            simpan_jawaban_form.submit();
            
        }
    </script>
    <form method="POST" action="{{ route('user.simpan_jawabanF') }}" id="simpan-jawaban" class="form-simpan-jawaban" autocomplete="off">
        @csrf
        <div id="question-container">
            @php
                $questionNumber = 251;
            @endphp
            @foreach ($data_jawaban as $data)
                @if ($data->kunci_jawabans_id >= 251 && $data->kunci_jawabans_id <= 300)
                    <div id="page-1" class="page">
                        <h1 class="mt-5 fs-3">Question {{ $questionNumber }}:</h1>
                        <div class="mt-3">
                            <input class="answer-input" type="text" name="biggamesanswer{{ $questionNumber }}"
                                id="biggamesanswer{{ $questionNumber }}" value='{{ $data->jawaban_kelompok }}'
                                placeholder="Answer here" autocomplete="off">
                        </div>
                        @php
                            $questionNumber++;
                        @endphp
                    </div>
                @endif
            @endforeach
        </div>
    </form>
@endsection
