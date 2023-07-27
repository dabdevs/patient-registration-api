<?php

namespace App\Http\Controllers;

use App\Events\PatientRegistered;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function store(PatientRequest $request)
    {
        // Save the patient data in the database
        $patient = Patient::create([
            'name' => $request->name, 
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // ... validation and database storage ...

        // Fire the event after patient data is stored
        event(new PatientRegistered($patient)); 

        return response()->json(['message' => 'Patient registered successfully'], 201);
    }

    public function show(Patient $patient)
    {
        return new PatientResource($patient); 
    }
}
