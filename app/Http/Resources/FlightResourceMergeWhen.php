<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FlightResourceMergeWhen extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'FlightId' => $this->FlightId,
            'Name' => $this->Name,
            'Price' => $this->Price,
            'Active' => $this->Active,
            'Destination' => $this->Destination,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            /**
             * 相同的條件下要回應多個資料
             */
            'ActiveStatus' => $this->mergeWhen($this->isActive(), [
                'Status1' => '111',
                'Status2' => '222'
            ]),

        ];
    }

    /**
     * 是否Active
     * Active = 1 , return true
     * Active = 0 , return false
     *
     * @return bool
     */
    public function isActive() {
        if($this->Active) {
            return true;
        } else {
            return false;
        }
    }
}
