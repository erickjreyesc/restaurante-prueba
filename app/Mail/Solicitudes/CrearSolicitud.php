<?php

namespace App\Mail\Solicitudes;

use App\Models\PQRSD\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CrearSolicitud extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email;
    public $token;
    public $codigo;
    public $desc;
    public $etapa;
    public $creado;
    public $nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Solicitud $solicitud)
    {
        $this->token = $solicitud->detalletoken;
        $this->codigo = $solicitud->codigo;
        $this->nombre = (is_null($solicitud->contacto->nombres)) ? __('mail.greeting.anonymous') : __('mail.greeting', ['name' => $solicitud->contacto->nombres]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.crear')->subject(__('mail.subject.created', ['code' => $this->codigo]));
    }
}
