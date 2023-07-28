<?php

namespace App\Jobs;

use App\Notifications\PatientRegistrationConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendPatientRegistrationConfirmationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $patient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($patient)
    {
        $this->patient = $patient;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() 
    { 
        // Send the confirmation notification to the registered patient
        $this->patient->notify(new PatientRegistrationConfirmation($this->patient));
    }
}
