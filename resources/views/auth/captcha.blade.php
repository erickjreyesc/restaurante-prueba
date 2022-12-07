<div class="mb-3">
    {!! NoCaptcha::renderJs('es-419' ) !!}
    {!! NoCaptcha::display(['data-callback' => 'onCallback' ]) !!}
</div>
@push('scripts')
<script type="text/javascript">
var onCallback = function () {
    @this.set('recaptcha', grecaptcha.getResponse());
}
</script>
@endpush
