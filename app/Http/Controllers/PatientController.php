<?php

namespace App\Http\Controllers;

use App\Events\PatientRegistered;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    public function register(PatientRequest $request)
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

        // Fire the event that will trigger the job to send the notifications
        event(new PatientRegistered($patient)); 

        return response()->json(['message' => 'Patient registered successfully'], 201);
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id); 
        
        return new PatientResource($patient); 
    }
}
