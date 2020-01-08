<table class="table table-striped table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>{{ __('admin.lesson-name') }}</th>
            <th>{{ __('admin.from-course') }}</th>
        </tr>
        </thead>
        <tbody>
            @each ('partials.lessons-table', $lessons, 'lesson', 'partials.no.lessons')
        </tbody>
</table>