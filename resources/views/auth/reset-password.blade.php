<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="row">
                <div class="pb-3 col-12 d-flex justify-content-center align-center">
                    <a href="https://www.caroycuervo.gov.co/">
                        <img class="text-center img-fluid" src="{{ asset('images/logos/Logo_ICC.png') }}" alt="Logo ICC"
                            style="width: 150px">
                    </a>
                </div>
            </div>
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/reset-password">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <x-jet-label value="{{ __('Contraseña') }}" />

                    <x-jet-input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" required autocomplete="new-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Confirmar Contraseña') }}" />

                    <x-jet-input class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation"></x-jet-input-error>
                </div>
                <div class="mb-3">
                    {!! NoCaptcha::renderJs('es-419' ) !!}
                    {!! NoCaptcha::display() !!}
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3" href="{{ route('login') }}">
                            {{ __('Ir al Login') }}
                        </a> 
                        
                        <x-jet-button>
                            {{ __('Restablecer Contraseña') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>