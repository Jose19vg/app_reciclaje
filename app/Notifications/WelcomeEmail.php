<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeEmail extends Notification
{
    use Queueable;

    public function __construct()
    {
        // Si necesitas pasar algún dato, lo puedes hacerlo aquí
    }

    public function via($notifiable)
    {
        // Definimos que la notificación será enviada por correo
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('¡Bienvenido a EcoVest! 🌿')
            ->line('Gracias por registrarte en nuestra aplicación. Esperamos que disfrutes tu experiencia.')
            ->action('Visitar nuestro sitio', url('/'))
            ->line('Si tienes alguna pregunta, no dudes en contactarnos.')
            ->salutation('Saludos cordiales, El equipo de EcoVest');
    }



}



