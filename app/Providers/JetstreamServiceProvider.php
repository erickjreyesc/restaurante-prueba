<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Fortify::authenticateUsing(function (Request $request) {
            if (config('app.env') != 'local') {
                $request->validate([
                    'g-recaptcha-response' => 'required|captcha'
                ],  [
                    'g-recaptcha-response.required' => 'Por favor, complete el captcha',
                ]);
            }


            $user = User::where('usuario', $request->usuario)->orWhere('email', $request->usuario)->first();
            if (
                $user &&
                Hash::check($request->password, $user->contrasena)
            ) {
                return $user;
            }
        });

        Fortify::confirmPasswordsUsing(function ($user, string $password) {
            return Hash::check($password, $user->contrasena);
        });

        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            //'delete',
        ]);
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
