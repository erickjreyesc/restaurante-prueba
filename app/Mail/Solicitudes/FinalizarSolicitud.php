<?php

namespace App\Mail\Solicitudes;

use App\Models\PQRSD\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class FinalizarSolicitud extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $desc;
    public $etapa;
    public $creado;
    public $nombre;
    public $fileauth;
    public $dependencia;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Solicitud $solicitud)
    {
        $this->solicitud = $solicitud;
        $this->nombre = (is_null($solicitud->contacto->nombres)) ? __('mail.greeting.anonymous') : __('mail.finished.secondtext', ['name' => $solicitud->contacto->nombres]);
        $this->desc = $solicitud->finish()->descripcion;
        $this->etapa = $solicitud->finish()->etapa->nombre;
        $this->creado = $solicitud->finish()->created_at;
        $this->dependencia = Str::ucfirst(Str::lower($solicitud->finish()->dependencia->nombre));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.finish')->subject(__('mail.texto.welcome.finish', ['code' => $this->solicitud->codigo]));
    }
}
