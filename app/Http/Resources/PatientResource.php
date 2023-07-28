<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray($request)
    {
        $date_registered = \Carbon\Carbon::parse($this->created_at);
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phoneNumber' => $this->phone_number,
            'photo' => $this->photo,
            'dateRegistered' => $date_registered->format('Y-m-d')
        ];
    }
}
