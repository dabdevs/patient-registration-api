<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $date_registered = \Carbon\Carbon::parse($this->created_at);

        return [
            'name' => $this->name,
            'email' => $this->email,
            'dateRegistered' => $date_registered->format('Y-m-d')
        ];
    }
}
