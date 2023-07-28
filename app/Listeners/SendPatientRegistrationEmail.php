<?php

namespace App\Listeners;

use App\Events\PatientRegistered;
use App\Jobs\SendPatientRegistrationEmailJob;
use App\Mail\PatientRegistrationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

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
        // Dispatch the Email sending job
        SendPatientRegistrationEmailJob::dispatch($event->patient); 
    }
}
