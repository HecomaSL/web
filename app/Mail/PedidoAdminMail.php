<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PedidoAdminMail extends Mailable {
    use Queueable, SerializesModels;

    public $pedido;

    public function __construct($pedido) {
        $this->pedido = $pedido;
    }

    public function build() {
        return $this->subject('🚀 Nuevo pedido pendiente - HECOMA')->view('emails.pedido_admin');
    }
}