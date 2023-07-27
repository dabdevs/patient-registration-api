<?php

namespace App\Listeners;

use App\Events\PatientRegistered;
use App\Mail\PatientRegistrationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPatientRegistrationEmail
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PatientRegistered  $event
     * @return void
     */
    public function handle(PatientRegistered $event)
    {
        $patient = $event->patient; 

        // Implement the email sending logic using Laravel's Mail class
        Mail::to($patient->email)->send(new PatientRegistrationEmail($patient));
    }
}
