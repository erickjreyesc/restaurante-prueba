<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <div class="row">
                <div class="pb-3 col-12 d-flex justify-content-center align-center">
                    <a href="https://www.caroycuervo.gov.co/">
                        <img class="text-center img-fluid" src="{{ asset('/images/logos/Logo_ICC.png') }}"
                            alt="Logo ICC" style="width: 150px">
                    </a>
                </div>
            </div>
        </x-slot>

        <div class="card-body">

            <x-jet-validation-errors class="mb-3 rounded-0" />

            @if (session('status'))
            <div class="mb-3 alert alert-success rounded-0" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @include('layouts.messages')
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <x-jet-label value="{{ __('Usuario o correo electrónico') }}" />

                    <x-jet-input class="{{ $errors->has('usuario') ? 'is-invalid' : '' }}" type="text" name="usuario"
                        :value="old('usuario')" required />
                    <x-jet-input-error for="usuario"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <x-jet-label value="{{ __('Contraseña') }}" />

                    <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                        name="password" required autocomplete="current-password" />
                    <x-jet-input-error for="password"></x-jet-input-error>
                </div>

                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <x-jet-checkbox id="remember_me" name="remember" />
                        <label class="custom-control-label" for="remember_me">
                            {{ __('Recuérdame') }}
                        </label>
                    </div>
                </div>
                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <x-jet-button>
                            {{ __('Acceder') }}
                        </x-jet-button>
                    </div>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
