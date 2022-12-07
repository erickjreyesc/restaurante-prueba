<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'g-recaptcha-response' => 'required|captcha'
        ],  [
            'g-recaptcha-response.required' => 'Por favor, complete el captcha',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function getPassword($token, $email)
    {
        if (!isset($token) || !isset($email)) {
            abort(404);
        }
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    }
}
