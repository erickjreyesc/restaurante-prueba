<div x-data="" x-on:change="value = $event.target.value" x-init="
        new Pikaday({ field: $refs.input, 'format': 'MM/DD/YYYY', firstDay: 1, minDate: new Date(), });"
    class="sm:w-27rem sm:w-full">
    <div class="relative mt-2">
        <input x-ref="input" x-bind:value="value" type="text" placeholder="Select date" />
    </div>
</div>
