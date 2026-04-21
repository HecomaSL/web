<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Datos del formulario de contacto.
     */
    public $datos;

    /**
     * Create a new message instance.
     */
    public function __construct($datos) {
        $this->datos = $datos;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        // El asunto del correo será el que el usuario puso en el formulario
        return new Envelope( subject: 'Web HECOMA: ' . $this->datos['asunto'], replyTo: $this->datos['email'], );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        // Asegúrate de crear este archivo en resources/views/emails/contacto.blade.php
        return new Content( view: 'emails.contacto', );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        $adjuntos = [];

        // Si hay una imagen en los datos, la adjuntamos
        if (isset($this->datos['imagen']) && $this->datos['imagen']) 
            $adjuntos[] = Attachment::fromPath($this->datos['imagen']->getRealPath())->as($this->datos['imagen']->getClientOriginalName())->withMime($this->datos['imagen']->getMimeType());

        return $adjuntos;
    }
}