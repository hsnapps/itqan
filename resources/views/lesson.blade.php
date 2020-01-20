@extends('layouts.global')

@push('styles')
<style>
    body{ height: 1200px; }
</style>
@endpush

@section('content')
@include('partials.lesson-header')

<div class="row">
    <div class="col-lg-6">
        @include('partials.lesson-sections')
    </div>
    <div class="col-lg-6">
        <!-- Video -->
        <div data-show="0">
            @includeWhen(isset($lesson->video), 'partials.video')
        </div>

        <!-- Files / References -->
        <div data-show="1">
            <ul class="list-group">
                @each('partials.lesson_file', $lesson->files, 'file', 'partials.no.files')
            </ul>
        </div>

        <!-- Quiz -->
        <div data-show="2">
            @include('partials.quiz')
        </div>

        <!-- Suggestions -->
        <div data-show="3">
            @include('partials.suggestion')
        </div>
    </div>
</div>

@include('partials.sending_quiz_modal')
@include('partials.quiz_result')
@endsection

@push('scripts')
<script>
$.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.search);
    return (results !== null) ? results[1] || 0 : false;
}

var activeSection = '0';
var str_questions = '{!! $questions !!}'
var questions = null;
var questions_ids = [];
var questionIndex = 0;
var answers = [];

if (str_questions.length > 0) {
    questions = JSON.parse(str_questions);
}

if (questions) {
    questions.forEach(q => {
        answers.push('N');
        questions_ids.push(q.id);
    });
    loadQuestion(questionIndex);
}

// $('[name="answer"]').click(function () {
    
// });

$('#next').click(function () {
    pickAnswer();
    questionIndex++;
    if (questionIndex === (questions.length - 1)) {
        $('#next-block').hide();
        $('#finish-block').show();
    }
    loadQuestion(questionIndex);
});

$('#prev').click(function () {
    pickAnswer();
    if (questionIndex === 0) { return; }

    questionIndex--;
    $('#next-block').show();
    $('#finish-block').hide();
    loadQuestion(questionIndex);
});

$('#finish').click(function () {
    pickAnswer();
    $.ajax({
        url: "{{ url('evaluate') }}",
        data: {
            questions: questions_ids,
            answers: answers
        },
        dataType: 'json',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        timeout: 10000,
        beforeSend: function () {
            $('#sending_quiz_modal').modal({
                keyboard: false,
                backdrop: 'static',
                show: true
            });
        },
        success: function (data) {
            $('#sending_quiz_modal').modal('hide');
            var bars = `
                <div class="progress-bar progress-bar-success progress-bar-striped" style="width: _success_%"></div>
                <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: _danger_%"></div>
            `;
            var correctCount = 0;
            var correct = 'fa-check text-success';
            var incorrect = 'fa-times text-danger';
            var row = `
            <tr>
                <td scope="row">_i_</td>
                <td>_answer_</td>
                <td>_correct_</td>
                <td class="text-center"><i class="fa _tick_" aria-hidden="true"></i></td>
            </tr>
            `;

            bars = bars.replace('_success_', data.percentage).replace('_danger_', 100 - data.percentage);
            $('.progress').html(bars);

            var items = [];
            for (let key = 0; key < data.questions.length; key++) {
                var tick = data.answers[key] === data.corrects[key] ? correct : incorrect;
                if (data.answers[key] === data.corrects[key]) {
                    correctCount++;
                }
                var item = row
                    .replace('_i_', key + 1)
                    .replace('_answer_', data.answers[key])
                    .replace('_correct_', data.corrects[key])
                    .replace('_tick_', tick);
                $("#answers tbody").append(item);
            }

            if (data.pass) {
                $('#result-label').removeClass('label-danger').addClass('label-success').text(correctCount+' من '+data.questions.length);
            } else {
                $('#result-label').removeClass('label-success').addClass('label-danger').text(correctCount+' من '+data.questions.length);
            }
            $('#quiz_result').modal('show').on('hidden.bs.modal', function (e) { location.reload(); });
        },
        complete: function () {
            $('#sending_quiz_modal').modal('hide');
        },
        error: function () {
            $('#sending_quiz_modal').modal('hide');
        }
    });
});

activeSection = $.urlParam('section');
if (activeSection) {
    displaySection(Number(activeSection));
} else {
    displaySection(0);
}

$('[data-section]').click(function () {
    var d = $(this).data('section');
    displaySection(d);
});

function loadQuestion(index) {
    var q = questions[index];
    var html = `@include('partials.question')`;
    html = html.replace('_i_', q.id).replace('_question_', q.question).replace('_A_', q.A).replace('_B_', q.B).replace('_C_', q.C).replace('_D_', q.D);
    $('#question-block').html(html);
}

function pickAnswer() {
    $('[name="answer"]').each(function(index, element){
        if ($(element).prop('checked')) {
            answers[questionIndex] = $(element).val();
        }
        return;
    });
}

function displaySection(tab) {
    $('[data-section]').removeClass('btn-primary').addClass('btn-default');
    $('[data-show]').hide();

    $('[data-section="' + tab + '"]').removeClass('btn-default').addClass('btn-primary');
    $('[data-show="' + tab + '"]').show();
    $('#lesson_video').get(0).pause();
    // document.location.search = '#section=' + tab;
    window.history.pushState(null, document.title, '?section=' + tab);
}

setTimeout(function () {
    $('.alert-success').hide(500);
}, 5000);
</script>
@endpush