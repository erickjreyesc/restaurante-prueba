<?php

namespace App\Mail\Admin;

use App\Models\User;
use App\Models\PQRSD\Solicitud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Str;

class AsignacionSolicitud extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $nombre;
    public $solicitud;
    public $titulo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $usuario, Solicitud $solicitud)
    {
        $this->nombre = __('mail.user', ['user' => $usuario->usuario]);
        $this->solicitud = $solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.admin.assign')->subject(__('mail.subject.assign', [
            'code' => $this->solicitud->codigo,
            'title' => Str::ucfirst(
                Str::lower(
                    $this->solicitud->lastData()->etapa->nombre
                )
            )
        ]));
    }
}
