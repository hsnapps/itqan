<div class="btn-group-vertical btn-group.btn-group-justified" role="group">
    <button data-section="0" type="button" class="btn btn-default btn-lg">{{ __('app.videos') }} <i class="fa fa-caret-left" aria-hidden="true"></i></button>
    <button data-section="1" type="button" class="btn btn-default btn-lg">{{ __('app.files') }} <i class="fa fa-caret-left" aria-hidden="true"></i></button>
    <button data-section="2" type="button" class="btn btn-default btn-lg">{{ __('app.quiz') }} <i class="fa fa-caret-left" aria-hidden="true"></i></button>
    <button data-section="3" type="button" class="btn btn-default btn-lg">{{ __('app.suggestions') }} <i class="fa fa-caret-left" aria-hidden="true"></i></button>
</div>
<div data-show="0" style="margin-top: 10px;">
    <div class="list-group">
        <div href="#" class="list-group-item ">
            {!! $lesson->description !!}
        </div>
    </div>
</div>
<div data-show="1" style="margin-top: 100px;"></div>
<div data-show="2" style="margin-top: 100px;"></div>
<div data-show="3" style="margin-top: 100px;"></div>