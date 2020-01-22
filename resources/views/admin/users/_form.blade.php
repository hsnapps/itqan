<div class="form-group">
    <label for="name">{{ __('admin.user.name') }}</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="{{ __('admin.user.name') }}" value="{{ isset($user) ? $user->name : '' }}">
</div>

<div class="form-group">
    <label for="email">{{ __('admin.user.email') }}</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('admin.user.email') }}" value="{{ isset($user) ? $user->email : '' }}">
</div>

<div class="form-group">
    <label for="department">{{ __('admin.user.department') }}</label>
    <input type="text" class="form-control" name="department" id="department" placeholder="{{ __('admin.user.department') }}" value="{{ isset($user) ? $user->department : '' }}">
</div>

<div class="form-group">
    <label for="section">{{ __('admin.user.section') }}</label>
    <input type="text" class="form-control" name="section" id="section" placeholder="{{ __('admin.user.section') }}" value="{{ isset($user) ? $user->section : '' }}">
</div>

<div class="form-group">
    <label for="permissions">{{ __('admin.user.permissions') }}</label>
    <div class="well well-sm">
        <div class="row">
        @foreach (App\Role::all() as $role)
        <div class="col-lg-3">
            <div class="checkbox">
                <label>
                    @if (isset($user))
                    <input id="{{ $role->name}}" name="role[]" value="{{ $role->id}}" type="checkbox" {{ $user->roles->contains($role) ? 'checked' : '' }}> {{ __('admin.roles.'.$role->name) }}
                    @else
                    <input id="{{ $role->name}}" name="role[]" value="{{ $role->id}}" type="checkbox"> {{ __('admin.roles.'.$role->name) }}                        
                    @endif
                </label>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</div>

@if (isset($user))
<div class="well ltr h4">
    <div class="row">
        <div class="col-lg-6">
            {{ __('admin.user.ad_group_value', ['group' => $user->ad_group]) }}
        </div>
        <div class="col-lg-6">
            {{ __('admin.user.ad_name_value', ['name' => $user->ad_name]) }}
        </div>
    </div>
</div>
@endif

@push('scripts')
<script>
    $(':checkbox').click(function(){
        if ($(this).attr('id') == 'admin') {
            changeCheckboxes();
        } else if ($(this).attr('id') == 'my-lessons') {
            $(':checkbox[id!="my-lessons"]').prop('checked', false);
        } else {
            $('#my-lessons').prop('checked', false);
        }
    });

    function changeCheckboxes() {
        var adminChecked = $('#admin').prop('checked');
        $(':checkbox').each(function(){
            if ($(this).attr('id') !== 'admin') {
                $(this).prop('disabled', adminChecked);
                if(adminChecked) {
                    $(this).prop('checked', adminChecked);
                } else {
                    $(':checkbox[id!="my-lessons"]').prop('checked', true);
                    $('#my-lessons').prop('checked', false);
                }
                
            }
        });
    }
</script>
@endpush