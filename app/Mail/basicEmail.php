<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class basicEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $fromEmail;
    public $typeEmail;

    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $objet;
    public $message;

    /**
     * Create a new message instance.
     */
    public function __construct($fromEmail, $typeEmail, $nom = null, $prenom = null, $tel = null, $objet = null, $message = null)
    {
        $this->fromEmail = $fromEmail;
        $this->typeEmail = $typeEmail;

        // Vérifiez si les informations supplémentaires sont fournies
        if ($nom && $prenom && $tel && $objet && $message) {
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->tel = $tel;
            $this->objet = $objet;
            $this->message = $message;
        }
    }

    /**
     * Build the message.
     */
    public function build()
    {
        if ($this->typeEmail == 'clientEmail') {
            return $this->from($this->fromEmail)
                        ->subject($this->objet)
                        ->view('contactEmail')
                        ->with([
                            'nom' => $this->nom,
                            'prenom' => $this->prenom,
                            'email_' => $this->fromEmail,
                            'tel_' => $this->tel,
                            'message_' => $this->message
                        ]);
        } else if ($this->typeEmail == 'MyEmail') {
            return $this->from($this->fromEmail)
                        ->subject('Kitly Support')
                        ->view('MyEmail');
        }
    }
}
