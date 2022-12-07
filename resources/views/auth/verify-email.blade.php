<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-center pb-3">
                    <a href="https://www.caroycuervo.gov.co/">
                        <img class="img-fluid text-center" src="{{ asset('images/logos/Logo_ICC.png') }}" alt="Logo ICC"
                            style="width: 150px">
                    </a>
                </div>
            </div>
        </x-slot>

        <div class="card-body">
            <div class="mb-3 small text-muted">
                {{ __('Gracias por registrarte! Antes de comenzar, ¿podría verificar su dirección de correo electrónico haciendo clic en el enlace que le acabamos de enviar? Si no recibió el correo electrónico, con gusto le enviaremos otro.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó durante el registro.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-jet-button type="submit">
                            {{ __('Reenviar correo electrónico de verificación') }}
                        </x-jet-button>
                    </div>
                </form>

                <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="btn btn-link">
                        {{ __('Cerrar sesión') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
