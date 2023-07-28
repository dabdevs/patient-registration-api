<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PatientRegistrationConfirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // Add 'sms' to the returned array when sms implementation is ready
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Thank you for registering to our medical facility. We are very happy have you as a part of our family.')
            ->line('Your registration details:')
            ->line('Name: ' . $notifiable->name)
            ->line('Email: ' . $notifiable->email)
            ->line('Phone Number: ' . $notifiable->phone_number)
            ->line('See you around!');
    }

    public function toSms($notifiable)
    {
        /* 
            Implement sms notification logic here
            We can use a package like twilio/sdk
        */
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
