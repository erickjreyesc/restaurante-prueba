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
            <div x-data="{ recovery: false }">
                <div class="mb-3" x-show="! recovery">
                    {{ __('Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación de autenticación.') }}
                </div>

                <div class="mb-3" x-show="recovery">
                    {{ __('Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.') }}
                </div>

                <x-jet-validation-errors class="mb-3" />

                <form method="POST" action="{{ route('two-factor.login') }}">
                    @csrf

                    <div class="mb-3" x-show="! recovery">
                        <x-jet-label value="{{ __('Codigo') }}" />
                        <x-jet-input class="{{ $errors->has('code') ? 'is-invalid' : '' }}" type="text"
                                     inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                        <x-jet-input-error for="code"></x-jet-input-error>
                    </div>

                    <div class="mb-3" x-show="recovery">
                        <x-jet-label value="{{ __('Codigo de Recuperación') }}" />
                        <x-jet-input class="{{ $errors->has('recovery_code') ? 'is-invalid' : '' }}" type="text"
                                     name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                        <x-jet-input-error for="recovery_code"></x-jet-input-error>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-outline-secondary"
                                x-show="! recovery"
                                x-on:click="
                                            recovery = true;
                                            $nextTick(() => { $refs.recovery_code.focus() })
                                        ">
                            {{ __('Usar un codigo de Recuperación') }}
                        </button>

                        <button type="button" class="btn btn-outline-secondary"
                                x-show="recovery"
                                x-on:click="
                                            recovery = false;
                                            $nextTick(() => { $refs.code.focus() })
                                        ">
                            {{ __('Usar un codigo de autenticación') }}
                        </button>

                        <x-jet-button>
                            {{ __('Acceder') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
