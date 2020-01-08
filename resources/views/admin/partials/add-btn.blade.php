@if (Route::currentRouteName() == 'admin.courses.lessons')
<script>
    $.get("{{ route('add-button') }}", { route: "{{ route('admin.lessons.new') }}" }, function(data){
        $(data).appendTo('.breadcrumb');
        $('[data-link]').click(function(){
            window.location.assign($(this).data('link'));
        });
    }, 'html');
</script>  
@else
<script>
    $.get("{{ route('add-button') }}", { route: "{{ route(Route::currentRouteName().'.new') }}"}, function(data){
        $(data).appendTo('.breadcrumb');
        $('[data-link]').click(function(){
            window.location.assign($(this).data('link'));
        });
    }, 'html');
</script>
@endif