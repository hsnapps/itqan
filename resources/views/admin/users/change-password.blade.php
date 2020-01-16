<!-- Modal -->
<div class="modal fade" id="change_password_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="change_password_modal">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.users.change_password') }}" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="change_password_modal">{{ __('admin.user.change_password') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password_{{ $user->id }}">{{ __('admin.user.password') }}</label>
                        <input type="password" class="form-control" name="password" id="password_{{ $user->id }}" placeholder="{{ __('admin.user.password') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation_{{ $user->id }}">{{ __('admin.user.password') }}</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation_{{ $user->id }}" placeholder="{{ __('admin.user.password_confirmation') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('admin.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                </div>
            </div>
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $user->id }}">
        </form>
    </div>
</div>