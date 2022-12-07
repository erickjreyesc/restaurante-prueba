<?php

namespace App\Mail\Admin;

use App\Models\PQRSD\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NuevaSolicitud extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nombre;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usuario, Solicitud $solicitud)
    {
        $this->nombre = __('mail.user', ['user' => $usuario]);
        $this->solicitud = $solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin.new')->subject(__('mail.subject.new', ['code' => $this->solicitud->codigo ]));
    }
}
