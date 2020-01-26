<!-- Show Suggestion Modal -->
<div class="modal fade" id="show_{{ $suggestion->id }}" data-id="{{ $suggestion->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.suggestions.add-note') }}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('admin.suggestions.modal-title', ['name' => $suggestion->getRankName()]) }}</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="rank">{{ __('app.rank') }}</label>
                                <input type="text" class="form-control" id="rank" placeholder="{{ __('app.rank') }}" disabled readonly value="{{ $suggestion->rank }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="rank">{{ __('app.name') }}</label>
                                <input type="text" class="form-control" id="name" placeholder="{{ __('app.name') }}" disabled readonly value="{{ $suggestion->name }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="rank">{{ __('app.military_number') }}</label>
                                <input type="text" class="form-control" id="military_number" placeholder="{{ __('app.military_number') }}" disabled readonly value="{{ $suggestion->military_number }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="rank">{{ __('app.department') }}</label>
                                <input type="text" class="form-control" id="department" placeholder="{{ __('app.department') }}" disabled readonly value="{{ $suggestion->department }}">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('admin.suggestions.date') }}</label>
                                <input type="text" class="form-control" id="date" placeholder="{{ __('app.date') }}" disabled readonly value="{{ hindi($suggestion->created_at->format(env('DATE_FORMAT')))}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('admin.suggestions.time') }}</label>
                                <input type="text" class="form-control" id="time" placeholder="{{ __('app.time') }}" disabled readonly value="{{ hindi($suggestion->created_at->format('H:i'))}}">
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('app.suggestion') }}</label>
                                <textarea class="form-control" rows="3" readonly>{{ $suggestion->suggestion }}</textarea>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('admin.suggestions.notes') }}</label>
                                <textarea name="notes" class="form-control" rows="3">{{ $suggestion->notes }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{ $suggestion->id }}">
                {{ csrf_field() }}

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('app.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>