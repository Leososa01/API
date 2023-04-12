<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PruebaMailTrap extends Mailable
{
use Queueable, SerializesModels;
public $subject = 'informacion de contacto';
//asunto del correo electronico
public $details;
/**
* Create a new message instance.
*
* @return void
*/
public function __construct($details)
{
$this->details = $details;
}
/**
* Build the message.
*
* @return $this
*/
public function build()
{
    //trae lo que vamos a mostrar
    return $this->subject('Mundos E!')
    //cualquier accion despues del return no se cumplira
    ->view('mail.view');
    //busca una vista(views) que este dentro de email
}
}
