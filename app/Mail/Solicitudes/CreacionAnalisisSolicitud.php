<?php

namespace App\Mail\Solicitudes;

use App\Models\PQRSD\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreacionAnalisisSolicitud extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email;
    public $token;
    public $codigo;
    public $creado;
    public $nombre;
    public $canal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Solicitud $solicitud)
    {
        $this->token = $solicitud->detalletoken;
        $this->codigo = $solicitud->codigo;
        $this->creado = $solicitud->created_at;
        $this->canal = $solicitud->canal->nombre;
        $this->nombre = (is_null($solicitud->contacto->nombres)) ? __('mail.greeting.anonymous') : __('mail.greeting', ['name' => $solicitud->contacto->nombres]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.analisis')->subject(__('mail.subject.analyst', ['code' => $this->codigo]));
    }
}
