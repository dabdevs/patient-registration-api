<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone_number;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patient)
    {
        $this->name = $patient->name;
        $this->email = $patient->email;
        $this->phone_number = $patient->phone_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.patient_registration');
    }
}
