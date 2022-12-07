<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EstadoSolicitudUsuarioMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $body;
    public $imagen;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body)
    {
        $this->body = $body;
        $this->imagen = rand(1, 6);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.EstadoSolicitudUsuarioMail')
            ->subject("Información de solicitud: " . $this->body['codigo'])
            ->with('body', $this->body);
    }
}
