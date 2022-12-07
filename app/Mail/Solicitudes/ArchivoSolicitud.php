<?php

namespace App\Mail\Solicitudes;

use App\Models\PQRSD\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArchivoSolicitud extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $email;
    public $solicitud;
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
        $this->solicitud = $solicitud;
        $this->nombre = (is_null($solicitud->contacto->nombres)) ? __('mail.greeting.anonymous') : __('mail.greeting', ['name' => $solicitud->contacto->nombres]) ;
        $this->desc = $solicitud->lastData()->descripcion;
        $this->etapa = $solicitud->lastData()->etapa->nombre;
        $this->creado = $solicitud->lastData()->created_at;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.files')->subject(__('mail.subject.files', ['code' => $this->solicitud->codigo]));
    }
}
