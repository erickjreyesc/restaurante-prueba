<div wire:ignore x-data="{ values: @entangle($attributes->wire('model')), choices: null }" x-init="
    choices = new Choices($refs.multiple, {
        itemSelectText: '',
        removeItems: true,
        removeItemButton: true,
    });

    for (const [value, label] of Object.entries(values)) {
        choices.setChoiceByValue(value || label)
    }

    $refs.multiple.addEventListener('change', function (event) {
        values = []
        Array.from($refs.multiple.options).forEach(function (option) {
            values.push(option.value || option.text)
        })
    })
">
    <select x-ref="multiple" multiple="multiple">
        {{ $slot }} 
    </select>
</div>
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endpush
@push('scripts')
<!-- Include Choices JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
@endpush