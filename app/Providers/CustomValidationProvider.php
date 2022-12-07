<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationProvider extends ServiceProvider
{
    protected $validation;

    public function __construct()
    {
        $this->validation = new Validator;
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->validation::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match('/(^[A-Za-zñÑáéíóúÁÉÍÓÚ ]+$)+/', $value);
        });
        $this->validation::extend('alpha_nombres', function ($attribute, $value) {
            return preg_match('/(^[A-Za-zñÑáéíóúÁÉÍÓÚ\' ]+$)+/', $value);
        });
        $this->validation::extend('alpha_spaces_num', function ($attribute, $value) {
            return preg_match('/(^[A-Za-zñÑáéíóúÁÉÍÓÚ0-9 ]+$)+/', $value);
        });
        $this->validation::extend('string_alpha', function ($attribute, $value) {
            return preg_match('/(^[A-Za-zñÑáéíóúÁÉÍÓÚ0-9,. ]+$)+/', $value);
        });
        $this->validation::extend('string_user', function ($attribute, $value) {
            return preg_match('/(^[a-z0-9._]+$)+/', $value);
        });
    }
}
