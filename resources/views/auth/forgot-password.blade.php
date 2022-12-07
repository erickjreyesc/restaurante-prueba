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

            <div class="mb-3">
                {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente háganos saber su dirección de correo
                electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
                ') }}
            </div>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <x-jet-validation-errors class="mb-3" />

            <form method="POST" action="/forgot-password">
                @csrf

                <div class="mb-3">
                    <x-jet-label value="Correo Electrónico" />
                    <x-jet-input type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mb-3">
                    {!! NoCaptcha::renderJs('es-419' ) !!}
                    {!! NoCaptcha::display() !!}
                </div>

                <div class="d-flex justify-content-end align-items-baseline">
                    <a class="text-muted me-3" href="{{ route('login') }}">
                        {{ __('Ir al Login') }}
                    </a> 
                    
                    <x-jet-button>
                        {{ __('Enviar') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
