<div class="form-group">
    <label>{{ __('admin.lesson.question') }}</label>
    <textarea class="form-control" name="question" maxlength="500" minlength="2">{{ isset($question) ? $question->question : '' }}</textarea>
</div>
<div class="form-group">
    <label>{{ __('app.letters.A') }}</label>
    <textarea class="form-control" name="A" maxlength="500" minlength="2">{{ isset($question) ? $question->A : '' }}</textarea>
</div>
<div class="form-group">
    <label>{{ __('app.letters.B') }}</label>
    <textarea class="form-control" name="B" maxlength="500" minlength="2">{{ isset($question) ? $question->B : '' }}</textarea>
</div>
<div class="form-group">
    <label>{{ __('app.letters.C') }}</label>
    <textarea class="form-control" name="C" maxlength="500" minlength="2">{{ isset($question) ? $question->C : '' }}</textarea>
</div>
<div class="form-group">
    <label>{{ __('app.letters.D') }}</label>
    <textarea class="form-control" name="D" maxlength="500" minlength="2">{{ isset($question) ? $question->D : '' }}</textarea>
</div>
<div class="form-group">
    <label>{{ __('admin.lesson.correct') }}</label>
    <select name="correct" class="form-control">
        <option @if(isset($question)) {{ $question->correct == 'A' ? 'selected' : '' }} @endif value="A">{{ __('app.letters.A') }}</option>
        <option @if(isset($question)) {{ $question->correct == 'B' ? 'selected' : '' }} @endif value="B">{{ __('app.letters.B') }}</option>
        <option @if(isset($question)) {{ $question->correct == 'C' ? 'selected' : '' }} @endif value="C">{{ __('app.letters.C') }}</option>
        <option @if(isset($question)) {{ $question->correct == 'D' ? 'selected' : '' }} @endif value="D">{{ __('app.letters.D') }}</option>
    </select>
</div>