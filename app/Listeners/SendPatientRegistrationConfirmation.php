<?php

namespace App\Listeners;

use App\Events\PatientRegistered;
use App\Notifications\V1\PatientRegistrationConfirmation;
use Illuminate\Queue\InteractsWithQueue;

class SendPatientRegistrationConfirmation
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
     * @param  object  $event
     * @return void
     */
    public function handle(PatientRegistered $event)
    {
        // Dispatch the job to send notifications to registered patient
        $event->patient->notify(new PatientRegistrationConfirmation($event->patient));
    }
}
