<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaiementDroitInscriptionArtisan extends Notification
{
    use Queueable;
    protected $artisan;
    protected $LienDeValidation;

    /**
     * Create a new notification instance.
     */
    public function __construct($artisan, $LienDeValidation)
    {
        $this->artisan = $artisan;
        $this->LienDeValidation = $LienDeValidation;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)

            ->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('Validation de votre compte CNMCI')
            ->greeting('Bonjour '. formatSexe3($this->artisan->sexe). ' ' . $this->artisan->nom . ' ' . $this->artisan->prenom . ',')
            ->line('Merci pour la première étape de votre identification sur CNMCI. Veuillez cliquer sur le boutton ci-dessous pour payer votre droit d\'inscription.')
            ->action('Passez au paiement', $this->LienDeValidation)
            ->line('NB: Mail générer automatiquement ne pas y répondre!')
            ->line('Merci d’utiliser notre plateforme!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
