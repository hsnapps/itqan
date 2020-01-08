<footer class="footer">
    <div class="container">
        @if (auth()->check())
            <div class="row">
                <div class="col-lg-6">
                    <p class="text-muted">{{ hindi(auth()->user()->name) }}</p>
                </div>
                <div class="col-lg-6">
                    <p class="text-muted">{{ hindi(__('app.copyrights')) }}</p>
                </div>
            </div>
        @else
        <p class="text-muted">{{ hindi(__('app.copyrights')) }}</p>
        @endif
    </div>
</footer>