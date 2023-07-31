<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\PatientRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RegisterPatient;
use App\Http\Resources\Api\V1\PatientResource;
use App\Models\Patient;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function register(RegisterPatient $request) 
    {
        $photo = $request->file('document_photo');

        // Save the file in a patient's files directory
        $path = Storage::put('files/patients', $photo);

        // Save the patient in the database
        $patient = Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'document_photo' => $path
        ]);

        // Fire the event to send the notifications
        event(new PatientRegistered($patient));

        return response()->json([
            'message' => 'Patient registered successfully',
            'patient' => new PatientResource($patient)
        ], 201);
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);

        return new PatientResource($patient);
    }
}

