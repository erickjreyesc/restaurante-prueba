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

            <div class="mb-3 text-sm text-muted">
                {{ __('Esta es un área segura de la aplicación. Confirme su contraseña antes de continuar.') }}
            </div>

            <x-jet-validation-errors class="mb-2" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div>
                    <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                    <x-jet-input id="password" type="password" name="password" required autocomplete="current-password"
                        autofocus />
                </div>

                <div class="mt-4 before:d-flex justify-content-end align-items-baseline">
                    <a class="text-muted me-3" href="{{ route('login') }}">
                        {{ __('Ir al Login') }}
                    </a>

                    <x-jet-button class="ms-4">
                        {{ __('Confirmar') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>