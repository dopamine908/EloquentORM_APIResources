<?php

namespace App\Http\Resources;

/**
 * Resource 繼承 Illuminate\Http\Resources\Json\Resource
 */
use Illuminate\Http\Resources\Json\Resource;

class FlightResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'FlightId' => $this->FlightId,
            'Name' => $this->Name,
            'Price' => $this->Price,
            'Active' => $this->Active,
            'Destination' => $this->Destination,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
