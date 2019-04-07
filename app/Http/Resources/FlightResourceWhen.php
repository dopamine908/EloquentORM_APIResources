<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FlightResourceWhen extends Resource
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
             * $this->isActive() 方法回傳 true時
             * ActiveStatus 鍵才會在回應中被回傳 => 值則為設定的Active
             * 若 $this->isActive() 回傳 false
             * ActiveStatus 鍵會從資源回應中完全刪除
             */
            'ActiveStatus' => $this->when($this->isActive(), 'Active'),
            /**
             * when 方法也接收閉包作為它的第二個參數
             */
            'ActiveStatus1' => $this->when($this->isActive(), function () {
                return 'Closure Active';
            }),
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
