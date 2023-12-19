
<footer class="dash-footer">
  <div class="footer-wrapper">
    <div class="py-1">
      <span class="text-muted">{{ __('Copyright') }} &copy;
        {{ env('FOOTER_TEXT') ? env('FOOTER_TEXT') : config('app.name', 'Taskly') }}
        {{ date('Y') }}
        {{-- {{env('FOOTER_TEXT')}} --}}
      </span >
    </div>
  </div>
</footer>
