<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array
     */
    protected function passwordRules()
    {
        return [
            'required',
            'string',
            (new Password)->length(12)->requireUppercase()->requireNumeric()->requireSpecialCharacter()->withMessage('La contraseña debe tener al menos 12 caracteres, una mayúscula, una minúscula y un carácter especial.'),
            'confirmed',
        ];
    }
}
