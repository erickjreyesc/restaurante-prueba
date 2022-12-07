<?php

namespace App\Traits;

use Lukeraymonddowning\Honey\Traits\WithRecaptcha;

trait RecaptchaTrait
{
    use WithRecaptcha;

    public function recaptchaValidate()
    {
        //Verificar si pasa el Captcha
        if (!($this->recaptchaPasses())) {
            session()->flash("error", __("Hubo un error verificando recaptcha, intente de nuevo."));
        }
    }
}
