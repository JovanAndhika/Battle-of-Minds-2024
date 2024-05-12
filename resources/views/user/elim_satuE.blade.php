@extends('layout.elim_satu_layout')

@section('form_soal')
    <form method="POST" action="{{ route('user.simpan_jawabanE') }}" id="simpan-jawaban" class="form-simpan-jawaban">
        @csrf
        <div id="question-container">
            @php
                $questionNumber = 201;
            @endphp
            @foreach ($data_jawaban as $data)
                @if ($data->kunci_jawabans_id >= 201 && $data->kunci_jawabans_id <= 250)
                    <div id="page-1" class="page">
                        <h1 class="mt-5 fs-3">Question {{ $questionNumber }}:</h1>
                        <div class="mt-3">
                            <input class="answer-input" type="text" name="biggamesanswer{{ $questionNumber }}"
                                id="biggamesanswer{{ $questionNumber }}" value='{{ $data->jawaban_kelompok }}' required
                                placeholder="Answer here">
                        </div>
                        @php
                            $questionNumber++;
                        @endphp
                    </div>
                @endif
            @endforeach
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" id="btn-save-jawaban" class="btn btn-primary">SAVE</button>
            </div>
        </div>
    </form>
@endsection
