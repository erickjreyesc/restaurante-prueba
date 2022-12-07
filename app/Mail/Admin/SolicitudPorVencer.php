<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SolicitudPorVencer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nombre;
    public $cerradas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, $cerradas)
    {
        $this->nombre = __('mail.user', ['user' => $usuario]);
        $this->cerradas = $cerradas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin.invalidtime')->subject('Solicitudes por vencerse');
    }
}
