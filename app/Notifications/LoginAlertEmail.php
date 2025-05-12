<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LoginAlertEmail extends Notification
{
    use Queueable;

    public function __construct()
    {
        // Si necesitas pasar algún dato adicional, puedes hacerlo aquí
    }

    public function via($notifiable)
    {
        // Definimos que la notificación será enviada por correo
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('¡Hola!')
                    ->line('Se ha iniciado sesión en tu cuenta.')
                    ->line('Si no fuiste tú, por favor cambia tu contraseña inmediatamente.')
                    ->action('Ver mi cuenta', url('/dashboard'))
                    ->line('EcoVest! 🌿');
    }
}
